<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class Modulo extends Model
{
	protected $table      = 'modulos';
	protected $primaryKey = 'id';
	public  $timestamps   = false;
	protected $filable = [
		'nome',
    'descricao',
  ];

  public function empresas(){
    return $this->belongsToMany(Empresa::class, 'aux_modulo_empresa');
  }
}
