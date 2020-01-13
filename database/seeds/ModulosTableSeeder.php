<?php

use Illuminate\Database\Seeder;
use App\Models\Modulo;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			Modulo::create ([
        'nome'        => 'Agenda',
        'descricao'       => 'Acesso às Módulo de Agenda no sistema.',
			]);

			Modulo::create ([
        'nome'        => 'Contatos',
        'descricao'       => 'Acesso às opções de Cadastros de novos Contatos no sistema.',
			]);

			Modulo::create ([
        'nome'        => 'Empresas',
        'descricao'       => 'Acesso às opções de Cadastros de novas Empresas no sistema.',
			]);

			Modulo::create ([
        'nome'        => 'Usuários',
        'descricao'       => 'Acesso às opções de Cadastros de novos Usuários no sistema.',
			]);

			Modulo::create ([
        'nome'        => 'Movimentos',
        'descricao'       => 'Acesso às opções de Pagamentos e Recebimentos no sistema.',
			]);

    }
}
