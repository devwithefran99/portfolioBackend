<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Visitor;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReply;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalWorks      = Work::count();
    $totalVisitors   = Visitor::count();
    $totalContacts   = Contact::count();
    $pendingContacts = Contact::where('status', 'pending')->count();

    $recentWorks    = Work::latest()->take(5)->get();
    $recentContacts = Contact::latest()->take(5)->get();
    $topWorks       = Work::orderByDesc('views')->take(5)->get();

    // Chart data
    $monthlyVisitors = [];
    $monthlyContacts = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthName = Carbon::create()->month($i)->format('M');
        $monthlyVisitors[$monthName] = Visitor::whereMonth('created_at', $i)
                                              ->whereYear('created_at', now()->year)
                                              ->count();
        $monthlyContacts[$monthName] = Contact::whereMonth('created_at', $i)
                                              ->whereYear('created_at', now()->year)
                                              ->count();
    }

    $worksByCategory = [
        'Social Media' => Work::where('category', 'mobile')->count(),
        'Web Design'   => Work::where('category', 'web')->count(),
        'Branding'     => Work::where('category', 'social')->count(),
    ];

    // ← শেষে একটাই return
    return view('backend.dashboard', compact(
        'totalWorks', 'totalVisitors', 'totalContacts', 'pendingContacts',
        'recentWorks', 'recentContacts', 'topWorks',
        'monthlyVisitors', 'monthlyContacts', 'worksByCategory'
    ));
}

    // ── Contact form submit (frontend public) ──────────────────
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
             'message' => 'required|string|max:2000',
        ]);

        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return redirect('/')->with('success', 'Message sent successfully!');
    }

    // ── Contact Messages page (admin) ──────────────────────────
   public function contacts()
{
    $contacts        = Contact::latest()->paginate(20);
    $pendingCount    = Contact::where('status', 'pending')->count();
    return view('backend.contacts', compact('contacts', 'pendingCount'));
}

    // ── Mark done ──────────────────────────────────────────────
    public function done($id)
    {
        Contact::findOrFail($id)->update(['status' => 'done']);
        return back()->with('success', 'Marked as done!');
    }

    // ── Delete contact ─────────────────────────────────────────
    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Message deleted!');
    }

    // ── Analytics page ─────────────────────────────────────────
   public function analytics()
{
    $totalVisitors  = Visitor::count();
    $todayVisitors  = Visitor::whereDate('created_at', today())->count();

    // Unique visitors (distinct IP)
    $uniqueVisitors = Visitor::distinct('ip')->count('ip');

    // সবচেয়ে বেশি visit হওয়া দিন
    $topDay = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderByDesc('count')
        ->first();

    // Monthly chart data
    $monthlyVisitors = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthName = Carbon::create()->month($i)->format('M');
        $monthlyVisitors[$monthName] = Visitor::whereMonth('created_at', $i)
            ->whereYear('created_at', now()->year)
            ->count();
    }

    // Last 30 days daily breakdown (নতুন chart এর জন্য)
    $dailyVisitors = [];
    for ($i = 29; $i >= 0; $i--) {
        $date = Carbon::today()->subDays($i);
        $dailyVisitors[$date->format('M d')] = Visitor::whereDate('created_at', $date)->count();
    }

    return view('backend.analytics', compact(
        'totalVisitors',
        'todayVisitors',
        'uniqueVisitors',
        'topDay',
        'monthlyVisitors',
        'dailyVisitors'
    ));
}

    // ── Reply to contact ───────────────────────────────────────────
public function reply(Request $request, $id)
{
    $request->validate([
        'reply_message' => 'required|string|min:10',
    ]);

    $contact = Contact::findOrFail($id);

    Mail::to($contact->email)->send(
        new ContactReply($contact->name, $request->reply_message)
    );

    // Auto mark as done after reply
    $contact->update(['status' => 'done']);

    return back()->with('success', '✅ Reply পাঠানো হয়েছে এবং message done হয়েছে!');
}
}