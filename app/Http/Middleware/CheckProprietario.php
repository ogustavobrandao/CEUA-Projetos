<?php

namespace App\Http\Middleware;

use App\Models\Solicitacao;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProprietario
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $solicitacao_id = $request->route()->parameter('solicitacao_id');
        $solicitacao = Solicitacao::find($solicitacao_id);
        if (!Auth::check()) {
            return redirect(route('home'))->with('error', 'Você precisa estar logado para acessar essa página!');
        }
        if (isset($solicitacao) && $solicitacao->user_id == Auth::user()->id || !isset($solicitacao)) {
            return $next($request);
        } else {
            return redirect(route('home'))->with('error', 'Você não possui privilégios para acessar essa página!');
        }
    }
}
