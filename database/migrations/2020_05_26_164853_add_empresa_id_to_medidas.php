<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpresaIdToMedidas extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('medidas', function (Blueprint $table) {
			$table->unsignedBigInteger('empresa_id')->unsigned();
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
		Schema::table('medidas', function (Blueprint $table) {
			$table->dropColumn(['empresa_id']);
		});
	}
}
