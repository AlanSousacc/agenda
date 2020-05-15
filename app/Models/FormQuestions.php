<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\User;
use App\Models\Formulario;

class FormQuestions extends Model
{
	protected $table      = 'form_questions';
	protected $primaryKey = 'id';
	protected $guarded 		= ['id', 'formulario_id','created_at', 'update_at'];
	protected $filable = [
    'question',
    'status',
  ];
	
  public function formulario(){
    return $this->belongsTo(Formulario::class);
  }
}