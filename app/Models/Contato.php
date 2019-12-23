<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Contato extends Model
{
  protected $filable = ['nome', 'documento', 'endereco', 'numero', 'cidade', 'status', 'telefone', 'email', 'datanascimento', 'empresa_id'];

  public function events(){
    return $this->hasMany('App\Models\Event');
  }

  public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
  }

  public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['nome']))
        $query->where('nome', 'like', '%'.$value['nome'].'%')
              ->where('empresa_id', '=', Auth::user()->empresa_id);
		})
		// ->toSql();
		// dd($resultado);
		->paginate(10);
  }

  public function getdatanascimentoAttribute($date) {
    if (!empty($date))
      return Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
  }

  public function movimentos(){
    return $this->hasMany('App\Models\Movimento');
  }
}
