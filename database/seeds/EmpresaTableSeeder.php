<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaTableSeeder extends Seeder
{
  public function run()
  {
		Empresa::create ([
			'razaosocial'        => 'Alan Wilian de Sousa',
			'nomefantasia'       => 'Alan Wilian de Sousa',
			'apelido'      			 => 'Alan Wilian de Sousa',
			'cnpj'     				   => '11.111.111/1111-11',
			'ie'       					 => '111.111.111',
			'im'       					 => '111.111.111',
			'telefone'       		 => '16991793351',
			'email'       			 => 'alansousa.cc@gmail.com',
			'cidade'       			 => 'Sales Oliveira',
			'endereco'       		 => 'Capitão Leopoldo dos Santos',
			'numero'       			 => '351',
			'cep'       				 => '14660-000',
			'bairro'       			 => 'Centro',
			'status'       			 => '1',
			'tipo'       				 => 'estetica',
		]);
	}
}
