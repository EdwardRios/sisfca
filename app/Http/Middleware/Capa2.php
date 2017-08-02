<?php

namespace App\Http\Middleware;

use Closure;

class Capa2
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
        if(!$request->has('dato2')){
            dd('Se detiene la peticion por que no hay dato 2');
        }
        return $next($request);
    }
}
