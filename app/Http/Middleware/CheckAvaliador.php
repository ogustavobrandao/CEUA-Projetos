<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAvaliador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect(route('home'))->with('error', 'Você precisa estar logado para acessar essa página!');
        }
        $allowedUserTypes = [1, 2];

        if (in_array(Auth::user()->tipo_usuario_id, $allowedUserTypes)) {
            return $next($request);
        } else {
            return redirect(route('home'))->with('error', 'Você não possui privilégios para acessar essa página!');
        }
    }
}
