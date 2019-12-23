<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condicao_pagamento extends Model
{
  protected $table = 'condicao_pagamento';

  public function movimentos(){
    return $this->hasMany('App\Models\Movimento');
  }
}
