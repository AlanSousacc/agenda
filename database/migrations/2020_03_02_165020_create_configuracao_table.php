<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracaoTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('configuracao', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('empresa_id');
			$table->boolean('atendimentosimultaneo')->default(0);

			$table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
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
		Schema::dropIfExists('configuracao');
	}
}
