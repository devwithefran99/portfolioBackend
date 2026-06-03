<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    // ── All list ──────────────────────────────────────────────
 public function index()
{
    $testimonials = Testimonial::orderBy('sort_order')
                               ->orderBy('created_at', 'desc')
                               ->paginate(15);
    return view('backend.testimonials.index', compact('testimonials'));
}

    // ── Add form ──────────────────────────────────────────────
    public function create()
    {
        return view('backend.testimonials.create');
    }

    // ── Store ─────────────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'client_name'  => 'required|string|max:255',
            'location'     => 'nullable|string|max:100',
            'review'       => 'required|string',
            'rating'       => 'required|integer|min:1|max:5',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('testimonials', 'public');
        }

        Testimonial::create([
            'client_name'  => $request->client_name,
            'location'     => $request->location,
            'review'       => $request->review,
            'rating'       => $request->rating,
            'photo'        => $photoPath,
            'is_published' => $request->boolean('is_published', true),
            'sort_order'   => $request->sort_order ?? 0,
        ]);

        return redirect()->route('backend.testimonials.index')
                         ->with('success', '✅ Testimonial সফলভাবে যোগ হয়েছে!');
    }

    // ── Edit form ─────────────────────────────────────────────
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    // ── Update ────────────────────────────────────────────────
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name'  => 'required|string|max:255',
            'location'     => 'nullable|string|max:100',
            'review'       => 'required|string',
            'rating'       => 'required|integer|min:1|max:5',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $data = [
            'client_name'  => $request->client_name,
            'location'     => $request->location,
            'review'       => $request->review,
            'rating'       => $request->rating,
            'is_published' => $request->boolean('is_published', true),
            'sort_order'   => $request->sort_order ?? $testimonial->sort_order,
        ];

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $data['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('backend.testimonials.index')
                         ->with('success', '✏️ Testimonial আপডেট হয়েছে!');
    }

    // ── Delete ────────────────────────────────────────────────
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }
        $testimonial->delete();

        return redirect()->route('backend.testimonials.index')
                         ->with('success', '🗑️ Testimonial মুছে ফেলা হয়েছে!');
    }
}