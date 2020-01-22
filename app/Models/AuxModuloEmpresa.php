<?php

namespace App\Models;
use App\Models\Modulo;
use App\Models\Empresa;

use Illuminate\Database\Eloquent\Model;

class AuxModuloEmpresa extends Model
{
	protected $table      = 'aux_modulo_empresa';
	protected $primaryKey = ['modulo_id', 'empresa_id'];
	protected $guarded 		= ['created_at', 'update_at'];
	protected $filable 		= [
		'modulo_id',
		'empresa_id',
		'status',
  ];

}
