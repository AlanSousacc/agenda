<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	protected $fillable = ['title', 'start', 'end', 'description', 'tipo_evento_id', 'contato_id', 'color', 'empresa_id', 'geracobranca', 'valorevento'];

	public function contato(){
		return $this->belongsTo('App\Models\Contato');
	}

	public function tipoEvento(){
		return $this->belongsTo('App\Models\TipoEvento');
	}

	public function getTitleAttribute($value)
	{
		return $this->contato->nome .' : '. $this->tipoEvento->titulo;
	}

	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
	}

	public function empresa(){
		return $this->belongsTo('App\Models\Empresa');
	}

	public function evento_log(){
		return $this->hasOne('App\Models\Evento_log');
	}

	public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['start']) && isset($value['end']))
			$query->whereBetween('start', [$value['start'], $value['end']]);

			if(isset($value['contato_id']))
			$query->where('contato_id', $value['contato_id']);

			if(isset($value['title']))
			$query->where('title',  'like', '%'.$value['title'].'%');

			if(isset($value['geracobranca']) && ($value['geracobranca']) == "on")
			$query->where('geracobranca', 1);

			$query->where('empresa_id', '=', Auth::user()->empresa_id);
		})
		// ->toSql();
		// dd($resultado);
		->paginate(10);
	}

	public function movimento(){
		return $this->belongsTo('App\Models\Movimento');
	}
}
