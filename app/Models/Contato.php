<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Contato extends Model
{
  protected $filable = ['nome', 'documento', 'endereco', 'numero', 'cidade', 'status', 'telefone', 'email', 'datanascimento', 'empresa_id'];

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

  public function event(){
    return $this->belongsToMany(Event::class);
  }

  public function empresa(){
    return $this->belongsTo(Empresa::class);
  }
}
