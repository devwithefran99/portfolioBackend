<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'tags'         => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        Service::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'tags'         => $request->tags,
            'is_published' => $request->boolean('is_published', true),
            'sort_order'   => $request->sort_order ?? 0,
        ]);

        return redirect()->route('backend.services.index')
                         ->with('success', '✅ Service যোগ হয়েছে!');
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'tags'         => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $service->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'tags'         => $request->tags,
            'is_published' => $request->boolean('is_published', true),
            'sort_order'   => $request->sort_order ?? $service->sort_order,
        ]);

        return redirect()->route('backend.services.index')
                         ->with('success', '✏️ Service আপডেট হয়েছে!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('backend.services.index')
                         ->with('success', '🗑️ Service মুছে ফেলা হয়েছে!');
    }
}