<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contato extends Model
{
  protected $filable = ['nome', 'documento', 'endereco', 'numero', 'cidade', 'status', 'telefone', 'email', 'tipocontato', 'datanascimento'];

  public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['nome']))
				$query->where('nome', 'like', '%'.$value['nome'].'%');
		})
		// ->toSql();
		// dd($resultado);
		->paginate(10);
	}

  public function getdatanascimentoAttribute($value){
    $datanascimento = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');

    return $datanascimento;
  }

  public function event(){
    return $this->belongsToMany(Event::class);
  }
}
