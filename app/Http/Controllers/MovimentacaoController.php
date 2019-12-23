<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Empresa;
use App\Models\Movimento;
use App\Models\Contato;
use App\Models\Condicao_pagamento;
use Illuminate\Support\Facades\DB;

class MovimentacaoController extends Controller
{
  public function index()
  {
    $user 		  = Auth::user()->empresa_id;
    $consulta   = Movimento::where('empresa_id', '=', $user)->whereMonth('movimented_at', date('m'))->paginate(10);
    $total      = $consulta->sum('valor');

    // dd($consulta);

    $contato    = Contato::where('empresa_id', '=', $user)->get();
    $pagamento  = Condicao_pagamento::all();

    return view('Admin.movimentacao.listagem', compact('consulta', 'contato', 'pagamento', 'total'));
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
