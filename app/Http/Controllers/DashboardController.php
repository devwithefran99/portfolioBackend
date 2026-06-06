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

    // ── Monthly Visitors — single query (was: 12 queries) ──────
    $visitorRows = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->pluck('total', 'month');

    // ── Monthly Contacts — single query (was: 12 queries) ──────
    $contactRows = Contact::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->pluck('total', 'month');

    // 12 মাসের array বানাও, missing month = 0
    $monthlyVisitors = [];
    $monthlyContacts = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthName = Carbon::create()->month($i)->format('M');
        $monthlyVisitors[$monthName] = $visitorRows[$i] ?? 0;
        $monthlyContacts[$monthName] = $contactRows[$i] ?? 0;
    }

    // ── Works by Category — single query (was: 3 queries) ──────
    $categoryRows = Work::selectRaw('category, COUNT(*) as total')
        ->groupBy('category')
        ->pluck('total', 'category');

    $worksByCategory = [
        'Social Media' => $categoryRows['mobile'] ?? 0,
        'Web Design'   => $categoryRows['web']    ?? 0,
        'Branding'     => $categoryRows['social'] ?? 0,
    ];

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
    $uniqueVisitors = Visitor::distinct('ip')->count('ip');

    $topDay = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderByDesc('count')
        ->first();

    // ── Monthly — single query (was: 12 queries) ───────────────
    $visitorRows = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->pluck('total', 'month');

    $monthlyVisitors = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthName = Carbon::create()->month($i)->format('M');
        $monthlyVisitors[$monthName] = $visitorRows[$i] ?? 0;
    }

    // ── Last 30 days — single query (was: 30 queries) ──────────
    $startDate = Carbon::today()->subDays(29);

    $dailyRows = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->whereDate('created_at', '>=', $startDate)
        ->groupBy('date')
        ->pluck('total', 'date');

    $dailyVisitors = [];
    for ($i = 29; $i >= 0; $i--) {
        $date = Carbon::today()->subDays($i);
        $key  = $date->format('M d');
        $dailyVisitors[$key] = $dailyRows[$date->toDateString()] ?? 0;
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