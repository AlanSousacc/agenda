<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

  // public function getcreatedAtAttribute($value){
  //   $criacao = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');

  //   return $criacao;
	// }

	public function empresa(){
    return $this->belongsTo(Empresa::class);
  }

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

  // public function getemailVerifiedAtAttribute($date) {
  //   if (!empty($date))
  //     return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
  // }

  // public function getupdatedAtAttribute($value){
  //   $alteracao = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');

  //   return $alteracao;
  // }

  // public function getemailVerifiedAtAttribute($value){
  //   $email_verificado = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');

  //   return $email_verificado;
  // }

  protected $fillable = [
    'name', 'email', 'password', 'profile', 'empresa_id'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
