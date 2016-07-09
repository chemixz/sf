<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptmembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('concepto_miembro', function(Blueprint $table)
		{
			$table->increments('id');
			$table->double('monto');
			$table->text('descripcion');
			$table->enum('estatus', array('Activo', 'Inactivo'))->default('Activo');

			$table->integer('miembro_id')->unsigned();
			$table->foreign('miembro_id')->references('id')->on('miembros')->onDelete('cascade');

			$table->integer('concepto_id')->unsigned();
			$table->foreign('concepto_id')->references('id')->on('conceptos')->onDelete('cascade');

			
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
		Schema::drop('conceptos_miembros');
	}

}
