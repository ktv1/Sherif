<?php

namespace App\Http\Middleware;

use Closure;
use App\Blacklist as Blocked;

class BlockedIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isBlocked = Blocked::where('ip', '=', $request->ip())
            ->where('blocked', '=', true)
            ->where('deleted_at', '=', null)->get();

        if(count($isBlocked)) {
            exit;
        }

        return $next($request);
    }
}
