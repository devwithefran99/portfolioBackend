<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Add Work page
     */
    public function addWork()
    {
        return view('backend.add-work');
    }

    /**
     * All Work page
     */
    public function allWork()
    {
        return view('backend.all-work');
    }

    
}