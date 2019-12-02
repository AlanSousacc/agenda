<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request){
    $consulta = User::paginate(10);

    return view('Admin.users.list', compact('consulta', 'dataForm'));
  }

  public function search(Request $request, User $user){
    $dataForm = $request->except('_token');

    $consulta = $user->search($dataForm);
    return view('Admin.users.list', compact('consulta', 'dataForm'));
  }

  public function myAccount(){
    $user = Auth::user();
    // dd($user);
    return view('Admin.users.myAccount', compact('user'));
  }

  public function update(User $user){
    if(Auth::user()->email == request('email')) {

      $this->validate(request(), [
        'name' => 'required',
        'password' => 'required|min:6|confirmed'
      ]);

      $user->name = request('name');
      $user->password = bcrypt(request('password'));

      $user->save();

      return back();

    } else {

      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return back();
      }
    }
  }
