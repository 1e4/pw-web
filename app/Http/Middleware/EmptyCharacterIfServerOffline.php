<?php

namespace App\Http\Middleware;

use Closure;
use Huludini\PerfectWorldAPI\API;

class EmptyCharacterIfServerOffline
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
        $api = new API();
        if ( !$api->serverOnline() )
        {
            $request->session()->forget('character');
        }
        return $next($request);
    }
}