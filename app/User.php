<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

  public function getcreatedAtAttribute($value){
    $criacao = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');

    return $criacao;
	}
	
	public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['name']))
				$query->where('name', 'like', '%'.$value['name'].'%');
		})
		// ->toSql();
		// dd($resultado);
		->paginate(5);
	}

  public function getupdatedAtAttribute($value){
    $alteracao = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');

    return $alteracao;
  }

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password', 'profile',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
