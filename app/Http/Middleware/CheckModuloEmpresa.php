<?php

namespace App\Http\Middleware;

use App\Models\Empresa;
use Closure;

class CheckModuloEmpresa
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

		//Verifica o ID da empresa do usuário logado
		$emp = auth()->user()->empresa_id;
		$empresa = Empresa::find($emp);

		//Verifica o status do módulo
    if ( $empresa->modulos()->pivot->status != 1 )
    return redirect()->route('unauthorized')->with('error', 'Este usuário não tem permissão para acessar esta página!');
    return $next($request);
  }
}
