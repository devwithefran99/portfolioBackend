<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /* ─── All Works List ─────────────────────────────────────── */
    public function index()
    {
        $works = Work::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('backend.works.all-works', compact('works'));
    }

    /* ─── Add Work Form ──────────────────────────────────────── */
    public function create()
    {
        return view('backend.works.add-work');
    }

    /* ─── Store New Work ─────────────────────────────────────── */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|in:mobile,web,social',
            'cover_image'  => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'popup_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:6144',
            'work_date'    => 'nullable|date',
            'is_extra'     => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $coverPath = $request->file('cover_image')->store('works', 'public');
        $popupPath = null;

        if ($request->hasFile('popup_image')) {
            $popupPath = $request->file('popup_image')->store('works', 'public');
        }

        Work::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'cover_image' => $coverPath,
            'popup_image' => $popupPath,
            'work_date'   => $request->work_date,
            'is_extra'    => $request->boolean('is_extra'),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('works.index')
                         ->with('success', '✅ নতুন কাজ সফলভাবে যোগ হয়েছে!');
    }

    /* ─── Edit Form ──────────────────────────────────────────── */
    public function edit(Work $work)
    {
        return view('backend.works.edit-work', compact('work'));
    }

    /* ─── Update Work ────────────────────────────────────────── */
    public function update(Request $request, Work $work)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|in:mobile,web,social',
            'cover_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'popup_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:6144',
            'work_date'    => 'nullable|date',
            'is_extra'     => 'nullable|boolean',
            'sort_order'   => 'nullable|integer',
        ]);

        $data = [
            'title'      => $request->title,
            'category'   => $request->category,
            'work_date'  => $request->work_date,
            'is_extra'   => $request->boolean('is_extra'),
            'sort_order' => $request->sort_order ?? $work->sort_order,
        ];

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($work->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('works', 'public');
        }

        if ($request->hasFile('popup_image')) {
            if ($work->popup_image) {
                Storage::disk('public')->delete($work->popup_image);
            }
            $data['popup_image'] = $request->file('popup_image')->store('works', 'public');
        }

        $work->update($data);

        return redirect()->route('works.index')
                         ->with('success', '✏️ কাজটি সফলভাবে আপডেট হয়েছে!');
    }

    /* ─── Delete Work ────────────────────────────────────────── */
    public function destroy(Work $work)
    {
        Storage::disk('public')->delete($work->cover_image);
        if ($work->popup_image) {
            Storage::disk('public')->delete($work->popup_image);
        }
        $work->delete();

        return redirect()->route('works.index')
                         ->with('success', '🗑️ কাজটি সফলভাবে মুছে ফেলা হয়েছে!');
    }
}