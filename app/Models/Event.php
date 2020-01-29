<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
  protected $fillable = ['title', 'start', 'end', 'description', 'contato_id', 'color', 'empresa_id'];

  public function contato(){
    return $this->belongsTo('App\Models\Contato');
  }

  public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
  }

  public function search($value){
    return $this->where(function ($query) use ($value) {
      if(isset($value['start']) && isset($value['end']))
      $query->whereBetween('start', [$value['start'], $value['end']]);

      if(isset($value['contato_id']))
      $query->where('contato_id', $value['contato_id']);

      if(isset($value['title']))
      $query->where('title',  'like', '%'.$value['title'].'%');
    })
    // ->toSql();
    // dd($resultado);
    ->paginate(10);
  }

  public function movimentos(){
    return $this->hasOne('App\Models\Movimento');
  }
}
