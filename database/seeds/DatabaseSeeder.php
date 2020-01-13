<?php

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
      $this->call(EmpresaTableSeeder::class);
      $this->call(condicao_pagamentoTableSeeder::class);
			$this->call(UsersTableSeeder::class);
			$this->call(ModulosTableSeeder::class);
    }
}
