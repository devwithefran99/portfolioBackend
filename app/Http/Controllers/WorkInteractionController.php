<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkInteractionController extends Controller
{
    // View +1
    public function trackView(Work $work)
    {
        $work->increment('views');
        return response()->json(['views' => $work->views]);
    }

    // Like toggle
    public function toggleLike(Request $request, Work $work)
    {
        $action = $request->input('action');

        if ($action === 'like') {
            $work->increment('likes');
        } else {
            if ($work->likes > 0) {
                $work->decrement('likes');
            }
        }

        // fresh() বাদ — increment/decrement এর পর model already updated
        return response()->json([
            'likes'  => $work->likes,
            'action' => $action
        ]);
    }
}