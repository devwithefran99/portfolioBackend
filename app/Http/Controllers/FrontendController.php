<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $works = Work::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('frontend.index', compact('works'));
    }
}