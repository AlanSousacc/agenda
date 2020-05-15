<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->unsignedBigInteger('contato_id')->unsigned();
						$table->enum('tipom', ['Inicial', 'Progresso', 'Meta']);
						$table->double('peso', 5, 2);
						$table->double('altura', 5, 2);
						$table->double('imc', 5, 2);
						$table->double('torax', 5, 2)->nullable();
						$table->double('braco', 5, 2)->nullable();
						$table->double('antebraco', 5, 2)->nullable();
						$table->double('abdomem', 5, 2)->nullable();
						$table->double('quadril', 5, 2)->nullable();
						$table->double('coxa', 5, 2)->nullable();
						$table->double('panturrilha', 5, 2)->nullable();
						$table->timestamps();
						$table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidas');
    }
}
