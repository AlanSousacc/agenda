<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

use App\User;
use App\Models\Modulo;


class ModuloController extends Controller
{
	public function index()
  {
		$user 		  = Auth::user()->empresa_id;
    $consulta   = Modulo::where('empresa_id', '=', $user)->paginate(10);
    $total      = $consulta->sum('valor');

    return view('#nome da view aqui', compact('consulta'));
	}
}
