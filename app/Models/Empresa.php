<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Empresa extends Model
{
	protected $filable = ['razaosocial', 'nomefantasia', 'apelido', 'cnpj', 'ie', 'im', 'telefone', 'email', 'cidade', 'endereco', 'numero', 'cep', 'bairro', 'logo', 'tipo'];

	public function search($value){
		return $this->where(function ($query) use ($value) {
			if(isset($value['razaosocial']))
				$query->where('razaosocial', 'like', '%'.$value['razaosocial'].'%')->
				where('id', '!=', 1);
		})
		// ->toSql();
		// dd($resultado);
		->paginate(10);
	}

	public function users(){
    return $this->hasMany('App\User');
  }

	public function events(){
    return $this->hasMany('App\Models\Event');
  }

	public function contatos(){
    return $this->hasMany('App\Models\Contato');
  }

}
