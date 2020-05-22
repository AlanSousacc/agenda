<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormQuestionsTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('form_questions', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->longText('question');
			$table->boolean('status')->default(1);
		
			$table->unsignedBigInteger('formulario_id');

			$table->foreign('formulario_id')->references('id')->on('formularios')->onDelete('cascade');
			
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
		Schema::dropIfExists('form_questions');
	}
}
