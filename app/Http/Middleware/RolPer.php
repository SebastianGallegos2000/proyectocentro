<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolPer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Autentica el rol del usuario. Si el rol es 1 le permite el acceso a la página seleccionada
        if (auth()->user()->rol_id == 2) {
            return $next($request);
        }else{
            return redirect('no-autorizado');
        }


        
        return $next($request);
    }
}
