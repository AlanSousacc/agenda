<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('events', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title');
      $table->dateTime('start');
      $table->dateTime('end');
      $table->string('color');
      $table->longText('description')->nullable();
      $table->timestamps();
      $table->softDeletes();
      $table->unsignedBigInteger('contato_id')->unsigned();
      $table->unsignedBigInteger('empresa_id')->unsigned();

      $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
      $table->foreign('contato_id')->references('id')->on('contatos');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('events');
  }
}
