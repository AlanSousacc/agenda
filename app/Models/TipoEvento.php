<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class TipoEvento extends Model
{
  protected $table = 'tipo_evento';
  protected $filable = [
    'titulo',
    'status',
    'empresa_id'
  ];

	public function events(){
    return $this->hasMany('App\Models\Event');
	}
	
  public function empresa(){
    return $this->belongsTo(Empresa::class);
  }
}
