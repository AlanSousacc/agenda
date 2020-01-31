<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Models\AuxModuloEmpresa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  use RegistersUsers;
  protected $redirectTo = '/list-user';
	protected $empresa;

	public function __construct()
	{
		// verifica se a empresa tem permissão de acesso ao modulo de registrar usuario
		$this->middleware(function ($request, $next) {
			$this->empresa = Auth::user()->empresa_id;

			$permissao = AuxModuloEmpresa::where('empresa_id', $this->empresa)->where('modulo_id', 3)->first();
			if ($permissao->status != 1)
				return redirect()->route('unauthorized')->with('error', 'Acesso indisponível a esta empresa!');

    	return $next($request);
		});
	}

  protected function validator(array $data)
  {
  return Validator::make($data, [
    'name' 		 	 => ['required', 'string', 'max:255'],
    'email' 	 	 => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'profile'  	 => ['required'],
    'password' 	 => ['required', 'string', 'min:8', 'confirmed'],
    'empresa_id' => ['required'],
    ]);
  }

  protected function create(array $data)
  {
    return User::create([
      'name' 			 => $data['name'],
      'email' 		 => $data['email'],
      'profile' 	 => $data['profile'],
      'empresa_id' => $data['empresa_id'],
      'password' 	 => Hash::make($data['password']),
    ]);
  }
}
