<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkInteractionController extends Controller
{
    //  View +1
    public function trackView(Work $work)
    {
        $work->increment('views');
        return response()->json(['views' => $work->views]);
    }

    //  Like toggle
    public function toggleLike(Request $request, Work $work)
    {
        $action = $request->input('action'); // 'like' or 'unlike'

        if ($action === 'like') {
            $work->increment('likes');
        } else {
            if ($work->likes > 0) {
                $work->decrement('likes');
            }
        }

        return response()->json([
            'likes'  => $work->fresh()->likes,
            'action' => $action
        ]);
    }
}