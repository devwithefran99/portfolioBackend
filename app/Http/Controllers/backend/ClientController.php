<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('sort_order')->get();
        return view('backend.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('backend.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('clients', 'public');

        Client::create([
            'name'         => $request->name,
            'logo'         => $logoPath,
            'sort_order'   => $request->sort_order ?? 0,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('backend.clients.index')
                         ->with('success', 'Client added successfully!');
    }

    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($client->logo);
            $client->logo = $request->file('logo')->store('clients', 'public');
        }

        $client->name         = $request->name;
        $client->sort_order   = $request->sort_order ?? 0;
        $client->is_published = $request->has('is_published');
        $client->save();

        return redirect()->route('backend.clients.index')
                         ->with('success', 'Client updated successfully!');
    }

    public function destroy(Client $client)
    {
        Storage::disk('public')->delete($client->logo);
        $client->delete();

        return back()->with('success', 'Client deleted!');
    }
}