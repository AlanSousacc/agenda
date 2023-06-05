<?php
namespace Database\Seeders;
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

			CentroCusto::create ([
        'tipo'        => 'Receita',
				'descricao'   => 'Receitas Gerais',
				'empresa_id'	=> 1,
			]);

			CentroCusto::create ([
        'tipo'        => 'Despesa',
				'descricao'   => 'Despesas Gerais',
				'empresa_id'	=> 1,
			]);


    }
}
