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

        return view('backend.dashboard', compact(
            'totalWorks',
            'totalVisitors',
            'totalContacts',
            'pendingContacts',
            'recentWorks',
            'recentContacts'
        ));
    }

    // ── Contact form submit (frontend public) ──────────────────
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
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
        $contacts = Contact::latest()->get();
        return view('backend.contacts', compact('contacts'));
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
        $totalVisitors   = Visitor::count();
        $todayVisitors   = Visitor::whereDate('created_at', today())->count();

        $monthlyVisitors = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('M');
            $monthlyVisitors[$monthName] = Visitor::whereMonth('created_at', $i)->count();
        }

        return view('backend.analytics', compact(
            'totalVisitors',
            'todayVisitors',
            'monthlyVisitors'
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