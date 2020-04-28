<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
	protected $table      = 'grupos';
	protected $primaryKey = 'id';
	protected $guarded 		= ['id', 'created_at', 'update_at'];
  protected $filable = [
    'descricao',
  ];

	
  public function contatos(){
    return $this->hasMany('App\Models\Contato');
  }
}
