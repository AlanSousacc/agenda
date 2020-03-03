<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
	protected $table      = 'configuracao';
	protected $primaryKey = 'id';
	protected $filable 		= ['empresa_id', 'atendimentosimultaneo'];

	public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
  }
}
