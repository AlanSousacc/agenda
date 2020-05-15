<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\User;

class Formulario extends Model
{
	protected $table      = 'formularios';
	protected $primaryKey = 'id';
	// public  $timestamps   = false;
	protected $guarded 		= ['id', 'empresa_id', 'user_id','created_at', 'update_at'];
	protected $filable = [
    'descricao',
    'status',
  ];

	
  public function empresa(){
    return $this->belongsTo(Empresa::class);
  }
	
	public function user(){
		return $this->belongsTo(User::Class);
	}
}
