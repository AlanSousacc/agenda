<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Contato;
use Faker\Generator as Faker;

$factory->define(Contato::class, function (Faker $faker) {
  return [
    'nome' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'telefone' => $faker->phoneNumber,
    'created_at' => now(),
    'tipocontato' => 'Paciente',
    'status' => 1,
  ];
});
