<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contato extends Model
{
  protected $filable = ['nome', 'documento', 'endereco', 'numero', 'cidade', 'status', 'telefone', 'email', 'tipocontato', 'datanascimento'];
  protected $dateFormat = 'Y-m-d';

  public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['nome']))
				$query->where('nome', 'like', '%'.$value['nome'].'%');
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
}
