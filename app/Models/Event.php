<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    // use SoftDeletes;

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
      })
      // ->toSql();
      // dd($resultado);
      ->paginate(10);
    }

    // public function getStartAttribute($value){
    //   $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    //   $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');

    //   return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
    // }

    // public function getEndAttribute($value){
    //   $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    //   $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');

    //   return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value);
    // }
}
