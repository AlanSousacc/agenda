<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Contato;

class ContatosTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Contato::create([
			'nome'       		 => 'Fulano de Tal',
			'documento'      => '123.456.789-01',
			'endereco'       => 'Rua Primeiro de Abril',
			'telefone'       => '1638511000',
			'email'       	 => 'alansousa.cc@gmail.com',
			'cidade'       	 => 'Morro Agudo',
			'numero'       	 => '100',
			'datanascimento' => null,
			'tipocontato'    => 'Cliente',
			'status'       	 => 1,
			'valorsessao'    => null,
			'sexo'       		 => 'Masculino',
			'escolaridade'   => 'Ensino Médio Completo',
			'profissao'      => 'Vendedor',
			'nomeresponsavel'	 => null,
			'cpfresponsavel' 	 => null,
			'nomeparente'    	 => null,
			'observacao'     	 => null,
			'empresa_id'     	 => 1,
			'grupo_id'       	 => 3,
			]);
		}
	}
	