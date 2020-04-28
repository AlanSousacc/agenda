<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('empresas', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->timestamps();
      $table->string('razaosocial', 50);
      $table->string('nomefantasia', 50);
      $table->string('apelido', 30)->nullable();
      $table->string('cnpj', 18)->unique();
      $table->string('ie', 14)->nullable();
      $table->string('im', 14)->nullable();
      $table->string('telefone', 16)->nullable();
      $table->string('email', 30)->nullable();
      $table->string('cidade', 30)->nullable();
      $table->string('endereco', 30)->nullable();
      $table->string('numero', 5)->nullable();
      $table->string('cep', 19)->nullable();
      $table->string('bairro', 20)->nullable();
      $table->binary('logo')->nullable();
      $table->boolean('status');
      $table->string( 'logo' )->default('default.jpg')->change();
      $table->enum('tipo', ['estetica', 'clinica',]);
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('empresas');
  }
}
