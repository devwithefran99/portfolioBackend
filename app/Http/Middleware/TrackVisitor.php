<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->is('admin/*') && !$request->is('login') && !$request->is('register')) {
            $ip    = $request->ip();
            $today = Carbon::today()->toDateString();
            $cacheKey = 'visitor_' . md5($ip) . '_' . $today;

            // Cache-এ না থাকলেই শুধু DB check + insert
            if (!Cache::has($cacheKey)) {
                $alreadyVisited = Visitor::where('ip', $ip)
                    ->whereDate('created_at', $today)
                    ->exists();

                if (!$alreadyVisited) {
                    Visitor::create(['ip' => $ip]);
                }

                // আজকের জন্য cache করো (মধ্যরাত পর্যন্ত)
                $secondsUntilMidnight = Carbon::tomorrow()->diffInSeconds(now());
                Cache::put($cacheKey, true, $secondsUntilMidnight);
            }
        }

        return $next($request);
    }
}