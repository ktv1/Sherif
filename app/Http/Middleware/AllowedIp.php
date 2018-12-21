<?php

namespace App\Http\Middleware;

use App\Ip;
use Closure;
use View;

class AllowedIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $isadm;

    function __construct()
    {
        $this->isadm = 0;
    }

    public function handle($request, Closure $next)
    {
        $this->isadm = Ip::isadmin()->count();
        View::share('isadm',$this->isadm);
        return $next($request);
    }
}
