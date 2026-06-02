<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Testimonial;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $works        = Work::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        $testimonials = Testimonial::where('is_published', true)
                                   ->orderBy('sort_order')
                                   ->orderBy('created_at', 'desc')
                                   ->get();
        $profile      = Profile::getSingle();
        $skills       = Skill::orderBy('sort_order')->get();
         $services     = Service::where('is_published', true)->orderBy('sort_order')->get();

         return view('frontend.index', compact('works', 'testimonials', 'profile', 'skills', 'services'));
    }
   
}