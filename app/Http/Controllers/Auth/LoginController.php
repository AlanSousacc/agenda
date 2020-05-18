<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Empresa;

class LoginController extends Controller
{
		use AuthenticatesUsers;
		
    protected $redirectTo = '/';

    public function __construct()
    {
			$this->middleware('guest')->except('logout');
    }
}
