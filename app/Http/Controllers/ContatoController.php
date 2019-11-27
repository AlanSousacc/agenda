<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
  public function index()
  {
    $consulta = Contato::paginate(10);

    return view('Admin.contatos.listagem', compact('consulta'));
  }

  public function search(Request $request, Contato $cont){
		$contato = $request->except('_token');

    $consulta = $cont->search($contato);

    // dd($contato);

    return view('Admin.contatos.listagem', compact('consulta', 'contato'));
  }
}
