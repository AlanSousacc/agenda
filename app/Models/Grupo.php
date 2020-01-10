<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  protected $filable = [
    'descricao',
  ];

  public function contatos(){
    return $this->hasMany('App\Models\Contato');
  }
}
