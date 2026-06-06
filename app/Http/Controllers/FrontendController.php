<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Testimonial;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
{
    $works = Work::select('id', 'title', 'category', 'cover_image', 'popup_image', 'work_date', 'sort_order', 'is_extra', 'views', 'likes', 'created_at')
    ->orderBy('sort_order')
    ->orderBy('created_at', 'desc')
    ->get();

   $testimonials = Testimonial::select('id', 'client_name', 'location', 'review', 'rating', 'photo', 'sort_order')
    ->where('is_published', true)
    ->orderBy('sort_order')
    ->orderBy('created_at', 'desc')
    ->get();

    $profile  = Profile::getSingle();

   $skills = Skill::select('id', 'name', 'icon_path', 'percentage', 'sort_order')
    ->orderBy('sort_order')
    ->get();

    $services = Service::select('id', 'title', 'description', 'tags', 'sort_order')
    ->where('is_published', true)
    ->orderBy('sort_order')
    ->get();

    $clients = Client::select('id', 'name', 'logo', 'sort_order')
    ->where('is_published', true)
    ->orderBy('sort_order')
    ->get();

    return view('frontend.index', compact('works', 'testimonials', 'profile', 'skills', 'services', 'clients'));
}
   
}