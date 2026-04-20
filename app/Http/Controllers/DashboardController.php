<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        $totalVisitors = Visitor::count();

        // Monthly visitor count
        $monthlyVisitors = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('M');

            $count = Visitor::whereMonth('created_at', $i)->count();

            $monthlyVisitors[$monthName] = $count;
        }

        return view('backend.dashboard', compact(
            'contacts',
            'totalVisitors',
            'monthlyVisitors'
        ));
    }

    public function store(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    public function done($id)
    {
        Contact::findOrFail($id)->update([
            'status' => 'done'
        ]);

        return back();
    }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();

        return back();
    }
}