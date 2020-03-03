<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseNutriTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up(){
		Schema::create('anamnese_nutri', function (Blueprint $table) {
			$table->bigIncrements('id');
			// info de consulta
			$table->string('motivacao', 255);
			$table->string('expectativas', 100);
			$table->string('outrasinfconsulta', 255);
			// end inf consulta
			// inf historia pessoal social
			$table->enum('funcaointestinal', ['Normal', 'Constipação', 'Diarréia', 'Irregular']);
			$table->enum('qualidadesono', ['Menos que 5 horas/noite', 'Cerca de 5 horas/noite', 'Cerca de 6 horas/noite', 'Cerca de 7 horas/noite', 'Cerca de 8 horas/noite', 'Cerca de 9 horas/noite', 'Cerca de 10 horas/noite']);
			$table->enum('fumante', ['Sim', 'Não']);
			$table->enum('bebealcool', ['Sim', 'Não']);
			$table->enum('estadocivil', ['Solteiro', 'Casado', 'Divorciado', 'Viúvo']);
			$table->string('outrasinfpessoal', 255);
			// end inf historia pessoal social
			// inf historia gestacional
			$table->enum('tiporegistro', ['Gestação e Lactação', 'Gestação', 'Lactação']);
			$table->enum('tipogestacao', ['Gestação Única', 'Gestação Gemelar']);
			$table->date('ultimamenstruacao');
			$table->date('iniciolactacao');
			$table->string('duracaolactacao', 10);
			$table->string('observacaogestacional', 255);
			// end historia gestacional
			// inf historia alimentar
			$table->time('horalevantar');
			$table->time('horadeitar');
			$table->text('alimentospreferidos');
			$table->text('alimentosmalaceitos');
			$table->text('alergiasintolerancia');
			$table->enum('ingestaoagua', ['Menos de 0,5 litro', 'Entre 0,5 e 1 litro', 'Entre 1 e 1,5 litro', 'Entre 1,5 e 2 litros', 'Entre 2 e 2,5 litros', 'Entre 2,5 e 3 litros', 'Mais de 3 litros']);
			$table->string('outrasinfalimentar', 255);
			// end historia alimentar
			// historia clínica
			$table->string('patologias', 100);
			$table->string('medicacao', 100);
			$table->string('antecedentespessoais', 100);
			$table->string('antecedentesfamiliares', 100);
			$table->string('outrasinfclinica', 255);
			// end historia clínica
			$table->unsignedBigInteger('contato_id');
			$table->unsignedBigInteger('empresa_id');

			$table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
			$table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
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
		Schema::dropIfExists('anamnese_nutri');
	}
}
