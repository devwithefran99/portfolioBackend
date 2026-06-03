<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // শুধু frontend route track করব (admin/api বাদ)
        if (!$request->is('admin/*') && !$request->is('login') && !$request->is('register')) {
            $ip = $request->ip();
            $today = Carbon::today()->toDateString();

            // একই IP আজকে আগে এসেছে কিনা check
            $alreadyVisited = Visitor::where('ip', $ip)
                ->whereDate('created_at', $today)
                ->exists();

            if (!$alreadyVisited) {
                Visitor::create(['ip' => $ip]);
            }
        }

        return $next($request);
    }
}