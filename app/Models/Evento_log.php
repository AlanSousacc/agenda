<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Evento_log extends Model
{
	protected $table = 'evento_log';
  protected $filable = ['dtchegada', 'dtatendimento', 'duracaoespera', 'dtfimatendimento', 'duracaoatendimento', 'event_id', 'empresa_id'];
	
	public function event(){
    return $this->belongsTo('App\Models\Event');
	}
	
	public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
	}
	
}
