<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	* Seed the application's database.
	*
	* @return void
	*/
	public function run()
	{
		$this->call(GruposTableSeeder::class);
		$this->call(ModulosTableSeeder::class);
		$this->call(EmpresaTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(condicao_pagamentoTableSeeder::class);
		$this->call(CentroCustoTableSeeder::class);
		// $this->call(ContatosTableSeeder::class);
		$this->call(AuxModuloEmpresaTableSeeder::class);
	}
}
