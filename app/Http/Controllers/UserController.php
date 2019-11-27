<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request){
    $consulta = User::paginate(10);
    return view('Admin.users.list', compact('consulta'));
  }

  public function search(Request $request, User $user){
		$dataForm = $request->except('_token');

		$consulta = $user->search($dataForm);
		
    return view('Admin.users.list', compact('consulta', 'dataForm'));
  }
}
