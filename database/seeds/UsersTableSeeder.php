<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create ([
        'name'        => 'Alan Wilian de Sousa',
        'email'       => 'alansousa.cc@gmail.com',
        'password'    => bcrypt('14789635sousa'),
        'isAdmin'     => 1,
        'profile'     => 'Administrador',
        'empresa_id'  => 1,
			]);
			
			User::create ([
        'name'        => 'Daniel Braga Takegava',
        'email'       => 'takegavadaniel@gmail.com',
        'password'    => bcrypt('32132131'),
        'isAdmin'     => 1,
        'profile'     => 'Administrador',
        'empresa_id'  => 1,
      ]);

    }
}
