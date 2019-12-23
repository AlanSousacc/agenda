<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
  protected $filable = ['tipo', 'observacao', 'valor', 'movimented_at', 'event_id', 'condicao_pagamento_id', 'empresa_id', 'contato_id', 'user_id'];


  public function user(){
    return $this->belongsto('App\User');
  }

  public function empresa(){
    return $this->belongsto('App\Models\Empresa');
  }

  public function contato(){
    return $this->belongsto('App\Models\Contato');
  }

  public function condicao_pagamento(){
    return $this->belongsto('App\Models\Condicao_pagamento');
  }

  public function event(){
    return $this->hasOne('App\Models\Event');
  }

  // function getValorAttribute($value)
  // {
  //   return 'R$ '. number_format($value, 2, ',', '.');
  // }
}
