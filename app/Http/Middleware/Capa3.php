<?php

namespace App\Http\Middleware;

use Closure;

class Capa3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $edad)
    {
        if ($request->get('edad') < $edad){
            dd("Los menores de $edad años no pasan esta capita jejejeje");
        }
        return $next($request);
    }
}
