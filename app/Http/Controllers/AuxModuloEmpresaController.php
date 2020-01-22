<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class AuxModuloEmpresaController extends Controller
{
    public function index(){
			$empresa = Empresa::get()->where('id',1)->first();
			echo "<b>{$empresa->razaosocial}</b><br><br>";

			$modulos = $empresa->modulos;
			foreach($modulos as $mod){
					echo "{$mod->descricao} ___";
					echo "{$mod->pivot->status} ";
					echo "<br>";
			}
		}
}
