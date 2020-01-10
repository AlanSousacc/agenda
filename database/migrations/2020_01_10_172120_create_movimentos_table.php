<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('movimentos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('contato_id');
      $table->unsignedBigInteger('empresa_id');
      $table->unsignedBigInteger('condicao_pagamento_id');
      $table->unsignedBigInteger('event_id')->nullable();
      $table->string('tipo', 50);
      $table->text('observacao');
      $table->double('valor', 5, 2);
      $table->dateTime('movimented_at');
      $table->text('observacao')->nullable(true)->change();
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
      $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
      $table->foreign('condicao_pagamento_id')->references('id')->on('condicao_pagamento')->onDelete('cascade');
      $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('movimentos');
  }
}
