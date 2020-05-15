<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
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
    // Verifica se está logado, se não tiver redireciona
    if ( !auth()->check() )
    return redirect()->route('login');

    // verifica se usuário é admin do sistema
		if ( auth()->user()->isAdmin != 1 )
      return redirect()->route('unauthorized')->with('error', 'Este usuário não tem permissão para acessar esta página!');

    return $next($request);
  }
}
