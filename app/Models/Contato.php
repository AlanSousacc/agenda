<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Contato extends Model
{
  protected $filable = [
    'nome',
    'documento',
    'endereco',
    'numero',
    'cidade',
    'status',
    'telefone',
    'email',
    'datanascimento',
    'empresa_id',
    'tipocontato',
    'valorsessao',
    'sexo',
    'escolaridade',
    'profissao',
    'nomeresponsavel',
    'cpfresponsavel',
    'nomeparente',
    'telefoneparente',
    'observacao',
    'grupo_id'
  ];

  public function grupo(){
    return $this->belongsTo('App\Models\Grupo');
  }

  public function events(){
    return $this->hasMany('App\Models\Event');
  }

  public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
  }

  public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['nome']))
				$query->where('nome', 'like', '%'.$value['nome'].'%');
				$query->where('empresa_id', '=', Auth::user()->empresa_id);
		})->paginate(10);
		// ->toSql();
		// dd($resultado);
  }

  public function getdatanascimentoAttribute($date) {
    if (!empty($date))
      return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
  }

  public function movimentos(){
    return $this->hasMany('App\Models\Movimento');
	}

  public function medidas(){
    return $this->hasMany('App\Models\Medida');
  }
}
