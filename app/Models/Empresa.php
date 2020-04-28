<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Modulo;
use App\Models\TipoEvento;
use Illuminate\Support\Facades\Auth;

class Empresa extends Model
{
	protected $filable = ['razaosocial', 'nomefantasia', 'apelido', 'cnpj', 'ie', 'im', 'telefone', 'email', 'cidade', 'endereco', 'numero', 'cep', 'bairro', 'logo', 'tipo'];

	public function users(){
    return $this->hasMany('App\User');
	}
	
	public function licenca(){
    return $this->hasMany('App\Models\Licenca');
  }

	public function movimentos(){
    return $this->hasMany('App\Models\Movimento');
	}
	
	public function configuracoes(){
    return $this->hasMany('App\Models\Configuracoes');
  }

	public function events(){
    return $this->hasMany('App\Models\Event');
  }

	public function contatos(){
    return $this->hasMany('App\Models\Contato');
  }

	public function tipo_eventos(){
    return $this->hasMany(TipoEvento::class);
	}

	public function modulos(){
		return $this->belongsToMany(Modulo::class, 'aux_modulo_empresa', 'empresa_id','modulo_id')
		->withPivot('status')
		->withTimestamps();
	}

	public function centrocusto(){
    return $this->hasMany('App\Models\CentroCusto');
	}

}
