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
        'email'       => 'alan.sousa@avacyn.com.br',
        'password'    => bcrypt('@dmcli876'),
        'isAdmin'     => 1,
        'profile'     => 'Administrador',
        'empresa_id'  => 1,
			]);
			
			User::create ([
        'name'        => 'Daniel Braga Takegava',
        'email'       => 'daniel.takegava@avacyn.com.br',
        'password'    => bcrypt('@dmcli876'),
        'isAdmin'     => 1,
        'profile'     => 'Administrador',
        'empresa_id'  => 1,
			]);
    }
}
