<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(){
    $user = User::All();
    return view('Admin.users.list', compact('user'));
  }
}
