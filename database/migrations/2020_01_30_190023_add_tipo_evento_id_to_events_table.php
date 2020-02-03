<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoEventoIdToEventsTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('events', function (Blueprint $table) {
			$table->unsignedBigInteger('tipo_evento_id')->unsigned();
			$table->foreign('tipo_evento_id')->references('id')->on('tipo_evento');
		});
	}
	
	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('events', function (Blueprint $table) {
			Schema::dropColumn('tipo_evento_id');
		});
	}
}
