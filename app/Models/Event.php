<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'start', 'end', 'description', 'contato_id', 'color', 'empresa_id'];

    public function contato(){
      return $this->hasOne(Contato::class);
    }

    public function empresa(){
      return $this->belongsTo(Empresa::class);
    }

    public function search($value){
      return $this->where(function ($query) use ($value) {
        if(isset($value['contato.nome']))
          $query->join('contato', 'contato.id', '=', 'events.contato_id')->where('contato.nome', 'like', '%'.$value['contato.nome'].'%');
          // $query->where('nome', 'like', '%'.$value['nome'].'%')
          //       ->where('empresa_id', '=', Auth::user()->empresa_id);
      })->toSql();
      // ->toSql();
      dd($resultado);
      // ->paginate(10);
    }

    public function getStartAttribute($value){
      $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
      $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');

      return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
    }

    public function getEndAttribute($value){
      $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
      $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');

      return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value);
    }
}
