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
			'logo'       				 => 'default.png',
		]);
		// Empresa::create ([
		// 	'razaosocial'        => 'Empresa de Teste 1',
		// 	'nomefantasia'       => 'Empresa de Teste 1',
		// 	'apelido'      			 => 'Empresa de Teste 1',
		// 	'cnpj'     				   => '11.222.222/0002-11',
		// 	'ie'       					 => '222.111.222',
		// 	'im'       					 => '222.111.222',
		// 	'telefone'       		 => '16111111111',
		// 	'email'       			 => 'empresadeteste1@gmail.com',
		// 	'cidade'       			 => 'Morro Agudo',
		// 	'endereco'       		 => 'Rua da Empresa 1',
		// 	'numero'       			 => '111',
		// 	'cep'       				 => '14660-000',
		// 	'bairro'       			 => 'Centro',
		// 	'status'       			 => '1',
		// 	'tipo'       				 => 'estetica',
		// 	'logo'       				 => 'default.png',
		// ]);
		// Empresa::create ([
		// 	'razaosocial'        => 'Empresa de Teste 2',
		// 	'nomefantasia'       => 'Empresa de Teste 2',
		// 	'apelido'      			 => 'Empresa de Teste 2',
		// 	'cnpj'     				   => '22.222.222/0002-22',
		// 	'ie'       					 => '222.222.222',
		// 	'im'       					 => '222.222.222',
		// 	'telefone'       		 => '16222222222',
		// 	'email'       			 => 'empresadeteste2@gmail.com',
		// 	'cidade'       			 => 'Morro Agudo',
		// 	'endereco'       		 => 'Rua da Empresa 2',
		// 	'numero'       			 => '222',
		// 	'cep'       				 => '14660-000',
		// 	'bairro'       			 => 'Centro',
		// 	'status'       			 => '1',
		// 	'tipo'       				 => 'estetica',
		// 	'logo'       				 => 'default.png',
		// ]);
	}
}
