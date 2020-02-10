<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCobrancaToEventsTable extends Migration
{
	public function up()
	{
		Schema::table('events', function (Blueprint $table) {
			$table->tinyInteger('geracobranca');
		});
	}
	
	public function down()
	{
		Schema::table('events', function (Blueprint $table) {
		});
	}
}
