<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Condicao_pagamento;

class condicao_pagamentoTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('condicao_pagamento')->insert([
			[
				'nome'         => 'Dinheiro',
				'qtde_parcela' => '1',
			],
			[
				'nome'         => 'Cartão Débito',
				'qtde_parcela' => '1',
			],
			[
				'nome'         => 'Cartão Crédito 1x',
				'qtde_parcela' => '1',
			],
			[
				'nome'         => 'Cartão Crédito 2x',
				'qtde_parcela' => '2',
			],
			[
				'nome'         => 'Cartão Crédito 3x',
				'qtde_parcela' => '3',
			],
			[
				'nome'         => 'Conta Cliente',
				'qtde_parcela' => '0',
			],
		]);
	}
}
	