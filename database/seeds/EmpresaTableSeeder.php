<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaTableSeeder extends Seeder
{
  public function run()
  {
    Empresa::create ([
      'razaosocial'   => 'Alan Wilian de Sousa',
      'nomefantasia'  => 'Alan Wilian de Sousa',
      'apelido'       => 'Alan Wilian de Sousa',
      'cnpj'          => '11.111.111/1111-11',
      'ie'            => '111.111.111',
      'im'            => '111.111.111',
      'telefone'      => '16991793351',
      'email'         => 'alansousa.cc@gmail.com',
      'cidade'        => 'Sales Oliveira',
      'endereco'      => 'Capitão Leopoldo dos Santos',
      'numero'        => '351',
      'cep'           => '14660-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);

    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 2',
      'nomefantasia'  => 'Empresa de Teste 2',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '22.222.222/2222-22',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);

    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 3',
      'nomefantasia'  => 'Empresa de Teste 3',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '33.333.333/3333-33',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);

    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 4',
      'nomefantasia'  => 'Empresa de Teste 4',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '44.444.444/4444-44',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);

    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 5',
      'nomefantasia'  => 'Empresa de Teste 5',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '55.555.555/5555-55',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);


    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 6',
      'nomefantasia'  => 'Empresa de Teste 6',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '66.666.666/6666-66',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);


    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 7',
      'nomefantasia'  => 'Empresa de Teste 7',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '77.777.777/7777-77',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);


    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 8',
      'nomefantasia'  => 'Empresa de Teste 8',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '88.888.888/8888-88',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);


    Empresa::create ([
      'razaosocial'   => 'Empresa de Teste 9',
      'nomefantasia'  => 'Empresa de Teste 9',
      'apelido'       => 'Sem Apelido',
      'cnpj'          => '99.999.999/9999-99',
      'ie'            => '',
      'im'            => '',
      'telefone'      => '',
      'email'         => 'teste@teste.com',
      'cidade'        => 'Morro Agudo',
      'endereco'      => 'Rua número 2',
      'numero'        => '222',
      'cep'           => '14222-000',
      'bairro'        => 'Centro',
			'status'        => 1,
			'logo'					=> 'default.png'
    ]);
  }
}
