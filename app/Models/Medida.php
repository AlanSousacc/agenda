<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

use App\Models\Contato;

class Medida extends Model
{
	protected $table      = 'medidas';
	protected $primaryKey = 'id';
	protected $guarded 		= ['id', 'created_at', 'update_at'];
	protected $filable 		= [
		'contato_id',
		'tipom',
		'peso',
		'altura',
		'imc',
		'torax',
		'braco',
		'abdomem',
		'quadril',
		'coxa',
		'panturrilha'
  ];

	public function contato(){
    return $this->belongsto(Contato::class);
	}
}
