<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() || $request->user()->admin != 1){
            return new Response(view('unauthorized')->with('role', 'ADMIN'));
        }

        return $next($request);
    }
}
