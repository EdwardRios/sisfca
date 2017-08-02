<?php

namespace App\Http\Middleware;

use Closure;

class Capa1
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
        if(!$request->has('dato1')){
            dd('Se detiene la peticion por que no hay dato 1');
        }
        return $next($request);
    }
}
