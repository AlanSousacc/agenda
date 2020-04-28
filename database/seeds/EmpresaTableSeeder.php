<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Configuracao;

class EmpresaTableSeeder extends Seeder
{
  public function run()
  {
		Empresa::create ([
			'razaosocial'        => 'Avacyn IT',
			'nomefantasia'       => 'Avacyn IT',
			'apelido'      			 => 'Avacyn IT',
			'cnpj'     				   => '11.111.111/1111-11',
			'ie'       					 => '111.111.111',
			'im'       					 => '111.111.111',
			'telefone'       		 => '16991793351',
			'email'       			 => 'contato@avacyn.com.br',
			'cidade'       			 => 'Sales Oliveira',
			'endereco'       		 => 'Capitão Leopoldo dos Santos',
			'numero'       			 => '351',
			'cep'       				 => '14660-000',
			'bairro'       			 => 'Centro',
			'status'       			 => '1',
			'tipo'       				 => 'estetica',
			'logo'       				 => 'default.png',
		]);
	}
}
