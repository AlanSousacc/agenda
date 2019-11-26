<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request){
    $user = User::paginate(10);
    return view('Admin.users.list', compact('user'));
  }

  public function search(Request $request){
    $dataForm = $request->except('_token');

    $user = User::where('name', 'like', '%'.$request->name.'%')->paginate(10);
    return view('Admin.users.list', compact('user', 'dataForm'));
  }
}
