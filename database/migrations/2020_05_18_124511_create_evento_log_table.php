<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoLogTable extends Migration
{
	public function up()
	{
		Schema::create('evento_log', function (Blueprint $table) {
			$table->id();
			$table->dateTime('dtchegada'); //horario de chegada
			$table->dateTime('dtatendimento')->nullable(); //horario de inicio do atendimento
			$table->decimal('duracaoespera', 8, 2)->nullable(); // dtatendimento - dtchegada
			$table->dateTime('dtfimatendimento')->nullable(); //horario do fim do atendimento
			$table->decimal('duracaoatendimento', 8, 2)->nullable(); // dtfimatendimento - dtatendimento
			$table->timestamps();
			$table->unsignedBigInteger('event_id')->unsigned();
			$table->unsignedBigInteger('empresa_id')->unsigned();

			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			$table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('evento_log');
	}
}
