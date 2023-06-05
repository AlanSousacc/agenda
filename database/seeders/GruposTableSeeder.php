<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			Grupo::create ([
        'descricao'       => 'Infantil',
			]);
			Grupo::create ([
        'descricao'       => 'Adolescente',
			]);
			Grupo::create ([
        'descricao'       => 'Adulto',
			]);
			Grupo::create ([
        'descricao'       => 'Idoso',
			]);
    }
}
