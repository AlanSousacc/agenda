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
      $table->boolean('status');
      $table->string('cidade', 50);
      $table->double('valorsessao', 5, 2)->nullable();
      $table->enum('sexo', ['Masculino', 'Feminino']);
      $table->string('escolaridade', 50)->nullable();
      $table->string('profissao', 50)->nullable();
      $table->string('nomeresponsavel', 50)->nullable();
      $table->string('cpfresponsavel', 20)->nullable();
      $table->string('nomeparente', 50)->nullable();
      $table->string('telefoneparente', 50)->nullable();
      $table->text('observacao')->nullable();
      $table->unsignedBigInteger('empresa_id')->unsigned();
      $table->unsignedBigInteger('grupo_id')->unsigned();

      $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
      $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
      $table->timestamps();
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
