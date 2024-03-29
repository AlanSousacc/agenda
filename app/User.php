<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Empresa;
use App\Models\Formulario;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

	public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['name']))
        $query->where('name', 'like', '%'.$value['name'].'%')
              ->where('empresa_id', '=', Auth::user()->empresa_id);
		})
		// ->toSql();
		// dd($resultado);
		->paginate(10);
  }

  protected $fillable = [
    'name', 'email', 'password', 'profile', 'empresa_id'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
	];
	
	
	public function empresa(){
    return $this->belongsTo(Empresa::class);
	}
	
	public function formularios(){
    return $this->hasMany(Formulario::class);
	}
}
