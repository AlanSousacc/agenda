<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('formularios', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('descricao', 100);
			$table->boolean('status')->default(1);

			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('empresa_id');

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::dropIfExists('formularios');
	}
}
