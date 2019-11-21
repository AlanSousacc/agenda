<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('contatos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nome', 100);
      $table->string('documento', 30);
      $table->string('endereco', 60);
      $table->string('numero', 5);
      $table->string('telefone', 25);
      $table->string('email', 60)->unique();
      $table->date('datanascimento');
      $table->enum('tipocontato', ['profissional', 'paciente']);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('contatos');
  }
}
