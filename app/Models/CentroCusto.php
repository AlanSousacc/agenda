<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class CentroCusto extends Model
{
	protected $table      = 'centro_custo';
	protected $primaryKey = 'id';
	protected $guarded 		= ['id', 'empresa_id', 'created_at', 'update_at'];
	protected $filable 		= [
		'tipo',
		'descricao',
  ];

	public function empresa(){
    return $this->belongsto('App\Models\Empresa');
	}

	public function movimentos(){
    return $this->hasMany('App\Models\Movimento');
  }
}
