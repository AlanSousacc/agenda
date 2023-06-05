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

	protected $casts = ['movimented_at'];

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

	public function search($value){
		return $this->where(function ($query) use ($value) {			
			if(isset($value['contato_id']))
			$query->where('contato_id', $value['contato_id']);

			if(isset($value['status'])){
				$query->where('status', 1);
			} else {
				$query->where('status', 0);
			}

			$query->where('empresa_id', '=', Auth::user()->empresa_id);
		});
		// ->toSql();
		// dd($resultado);
		// ->paginate(10);
	}


  public function user(){
    return $this->belongsTo('App\User');
  }

  public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
  }

  public function contato(){
    return $this->belongsTo('App\Models\Contato');
  }

  public function condicao_pagamento(){
    return $this->belongsTo('App\Models\Condicao_pagamento');
	}

  public function centrocusto(){
    return $this->belongsTo('App\Models\CentroCusto');
  }

  public function event(){
    return $this->belongsTo('App\Models\Event');
  }
}
