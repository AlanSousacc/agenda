<?php

use Illuminate\Database\Seeder;
use App\Models\CentroCusto;

class CentroCustoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			Modulo::create ([
        'tipo'        => 'Receita',
				'descricao'   => 'Receitas Gerais',
				'empresa_id'	=> 1,
			]);

			Modulo::create ([
        'tipo'        => 'Despesa',
				'descricao'   => 'Despesas Gerais',
				'empresa_id'	=> 1,
			]);


    }
}
