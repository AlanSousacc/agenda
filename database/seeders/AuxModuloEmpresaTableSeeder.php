<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\AuxModuloEmpresa;
use Carbon\Carbon;

class AuxModuloEmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AuxModuloEmpresa::create([
					'modulo_id' 		=> 1,
					'empresa_id' 		=> 1,
					'status' 				=> 1,
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
				]);

				AuxModuloEmpresa::create([
					'modulo_id' 		=> 2,
					'empresa_id' 		=> 1,
					'status' 				=> 1,
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
				]);

				AuxModuloEmpresa::create([
					'modulo_id' 		=> 3,
					'empresa_id' 		=> 1,
					'status' 				=> 1,
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
				]);

				AuxModuloEmpresa::create([
					'modulo_id' 		=> 4,
					'empresa_id' 		=> 1,
					'status' 				=> 1,
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
				]);

				AuxModuloEmpresa::create([
					'modulo_id' 		=> 5,
					'empresa_id' 		=> 1,
					'status' 				=> 1,
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
				]);

				AuxModuloEmpresa::create([
					'modulo_id' 		=> 6,
					'empresa_id' 		=> 1,
					'status' 				=> 1,
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
				]);
    }
}
