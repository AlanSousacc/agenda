<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Exception;
use Auth;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
  public function index()
  {
    $empresa = Empresa::paginate(10);

    return view('Admin.empresa.listagem', compact('empresa'));
  }

  public function create()
  {
    return view('Admin.empresa.novo');
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
