<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroCustoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_custo', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->unsignedBigInteger('empresa_id');
						$table->enum('tipo',['Receita','Despesa']);
						$table->string('descricao', 100);
						$table->timestamps();
						
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
        Schema::dropIfExists('centro_custo');
    }
}
