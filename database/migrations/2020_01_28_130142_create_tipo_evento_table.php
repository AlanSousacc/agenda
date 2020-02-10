<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoEventoTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('tipo_evento', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('titulo', 50);
      $table->boolean('status')->default(1);
      $table->timestamps();
      $table->unsignedBigInteger('empresa_id');

      $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('tipo_evento');
  }
}
