<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuxModeloEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::create('aux_modulo_empresa', function (Blueprint $table) {
				//$table->bigIncrements('id');
				$table->unsignedBigInteger('modulo_id');
				$table->unsignedBigInteger('empresa_id');
				$table->boolean('status');
				$table->timestamps();

				$table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
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
			Schema::dropIfExists('aux_modulo_empresa');
    }
}
