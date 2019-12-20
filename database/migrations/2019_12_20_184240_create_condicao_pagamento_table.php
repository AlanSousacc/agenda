<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicaoPagamentoTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('condicao_pagamento', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nome', 50);
      $table->integer('qtde_parcela');
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
    Schema::dropIfExists('condicao_pagamento');
  }
}
