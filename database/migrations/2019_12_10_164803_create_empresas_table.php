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
      $table->string('apelido', 30);
      $table->string('cnpj', 18);
      $table->string('ie', 14);
      $table->string('im', 14);
      $table->string('telefone', 16);
      $table->string('email', 30);
      $table->string('cidade', 30);
      $table->string('endereco', 30);
      $table->string('numero', 5);
      $table->string('cep', 19);
      $table->string('bairro', 20);
      $table->binary('logo');
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
