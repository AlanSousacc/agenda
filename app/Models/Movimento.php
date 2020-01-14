<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;

class Movimento extends Model
{
	protected $filable = [
    'tipo',
    'observacao',
    'valortotal',
    'valorrecebido',
    'valorpendente',
    'status',
    'movimented_at',
    'event_id',
    'condicao_pagamento_id',
    'empresa_id',
    'contato_id',
    'user_id'
  ];

	protected $dates = ['movimented_at'];

	public function personalizado($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['contato_id']))
				$query->where('contato_id', $value['contato_id']);

			if(isset($value['mstart']) || isset($value['mend']))
				$query->whereBetween('movimented_at', array($value['mstart'], $value['mend']));

		})->where('empresa_id', '=', Auth::user()->empresa_id)
		// ->toSql();
		// dd($resultado);
		->paginate(10);
	}


  public function user(){
    return $this->belongsto('App\User');
  }

  public function empresa(){
    return $this->belongsto('App\Models\Empresa');
  }

  public function contato(){
    return $this->belongsto('App\Models\Contato');
  }

  public function condicao_pagamento(){
    return $this->belongsto('App\Models\Condicao_pagamento');
  }

  public function event(){
    return $this->hasOne('App\Models\Event');
  }

  // function getValorAttribute($value)
  // {
  //   return 'R$ '. number_format($value, 2, ',', '.');
  // }
}
