<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licenca extends Model
{
  protected $fillable = ['dtvalidade', 'status', 'hash', 'empresa_id'];
	
	public function empresa(){
    return $this->belongsTo(Empresa::class);
  }
}
