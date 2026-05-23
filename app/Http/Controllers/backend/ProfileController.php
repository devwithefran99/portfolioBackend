<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // ── Profile settings page ──────────────────────────────────
    public function index()
    {
        $profile = Profile::getSingle();
        $skills  = Skill::orderBy('sort_order')->get();
        return view('backend.profile.index', compact('profile', 'skills'));
    }

    // ── Update profile ─────────────────────────────────────────
    public function update(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'tagline'      => 'nullable|string|max:255',
            'bio'          => 'nullable|string',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'nullable|string|max:20',
            'location'     => 'nullable|string|max:100',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'cv'           => 'nullable|mimes:pdf|max:5120',
            'behance'      => 'nullable|url|max:255',
            'facebook'     => 'nullable|url|max:255',
            'linkedin'     => 'nullable|url|max:255',
            'whatsapp'     => 'nullable|string|max:20',
            'fiverr'       => 'nullable|url|max:255',
            'telegram'     => 'nullable|string|max:100',
            'open_to_work' => 'nullable|boolean',
        ]);

        $profile = Profile::getSingle();

        $data = $request->except(['photo', 'cv', '_token', '_method']);
        $data['open_to_work'] = $request->boolean('open_to_work');

        if ($request->hasFile('photo')) {
            if ($profile->photo) Storage::disk('public')->delete($profile->photo);
            $data['photo'] = $request->file('photo')->store('profile', 'public');
        }

        if ($request->hasFile('cv')) {
            if ($profile->cv) Storage::disk('public')->delete($profile->cv);
            $data['cv'] = $request->file('cv')->store('profile', 'public');
        }

        $profile->update($data);

        return back()->with('success', '✅ Profile আপডেট হয়েছে!');
    }

    // ── Add skill ──────────────────────────────────────────────
    public function storeSkill(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:100',
            'percentage' => 'required|integer|min:1|max:100',
            'icon'       => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1024',
            'sort_order' => 'nullable|integer',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('skills', 'public');
        }

        Skill::create([
            'name'       => $request->name,
            'percentage' => $request->percentage,
            'icon_path'  => $iconPath,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return back()->with('success', '✅ Skill যোগ হয়েছে!');
    }

    // ── Delete skill ───────────────────────────────────────────
    public function destroySkill(Skill $skill)
    {
        if ($skill->icon_path) Storage::disk('public')->delete($skill->icon_path);
        $skill->delete();
        return back()->with('success', '🗑️ Skill মুছে ফেলা হয়েছে!');
    }
}