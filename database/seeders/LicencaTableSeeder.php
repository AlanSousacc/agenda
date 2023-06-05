<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Licenca;
use \Carbon\Carbon;

class LicencaTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Licenca::create ([
			'hash'        => md5(Carbon::now()->toDateString()),
			'dtinicio'    => Carbon::now()->toDateString(),
			'dtvalidade'  => '2220-05-15',
			'status'      => 1,
			'empresa_id'  => 1,
			'created_at'  => Carbon::now(),
			'updated_at'  => Carbon::now(),
		]);
	}
}
