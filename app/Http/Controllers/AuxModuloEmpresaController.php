<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;
use App\User;
use App\Models\Empresa;
use App\Models\Modulo;

class AuxModuloEmpresaController extends Controller
{
	public function teste(){
		$empresa = Empresa::get()->where('id',1)->first();
		echo "<b>{$empresa->razaosocial}</b><br><br>";
		
		$modulos = $empresa->modulos;
		foreach($modulos as $mod){
			echo "{$mod->descricao} ___";
			echo "{$mod->pivot->status} ";
			echo "<br>";
		}
	}
	
	public function teste2(){
		//Seleciona empresa com id = 1
		$empresa = Empresa::get()->where('id',1)->first();
		echo "<b>{$empresa->razaosocial}</b><br><br>";
		
		//Coleta todos os módulos cadastrados
		$zmodulos 				= Modulo::all();
		// Joga para um Array todos os ids dos módulos cadastrados
		$arr = array();
		foreach($zmodulos as $mod){
			$arr[] = $mod->id;
		}
		// Insere na tabela auxiliar, a empresa 1, e todos os ids de módulos
		$empresa->modulos()->attach($arr);
		
		$modulos = $empresa->modulos;
		foreach($modulos as $mod){
			echo "{$mod->nome} ___";
			echo "{$mod->pivot->status} ";
			echo "<br>";
		}
		
	}
	
	public function editarpermissao($id)
	{
		$zpermissao = Empresa::find($id);
		return view('Admin.empresa.moduloempresa.editar',compact('zpermissao'));
	}
	
	public function moduloempresa($id){
		
		$empresa = Empresa::find($id);
		// dd($empresa);
		$modulos = $empresa->modulos;
		foreach($modulos as $mod){
			echo "{$mod->nome} ___";
			echo "{$mod->descricao} ___";
			echo "{$mod->pivot->status} ";
			echo "<br>";
		}
	}
}
