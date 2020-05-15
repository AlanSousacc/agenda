<?php

namespace App\Http\Middleware;

use Closure;
use \Carbon\Carbon;
use App\Models\Empresa;
use App\Models\Licenca;

class CheckLicense
{
	public function handle($request, Closure $next)
	{		
		$dt			 = Carbon::now();
		$licenca = Licenca::where('empresa_id', auth()->user()->empresa_id)
											->where('status', 1)
											->where('dtvalidade', '>=', $dt->toDateString())
											->first();
		if(!$licenca)
			return redirect()->route('unauthorized-license')->with('error', 'Esta empresa encontra-se com a licença expirada, ou inativa!');

		return $next($request);
	}
}
