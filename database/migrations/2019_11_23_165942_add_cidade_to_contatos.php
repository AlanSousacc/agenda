<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCidadeToContatos extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::table('contatos', function (Blueprint $table) {
			$table->string('cidade', 50);
		});
	}
	
	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::table('contatos', function (Blueprint $table) {
			//
		});
	}
}