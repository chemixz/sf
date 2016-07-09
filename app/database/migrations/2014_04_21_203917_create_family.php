<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamily extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('familias', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('nombre', 100);
			$table->text('dirección',100);
			$table->string('telf', 100);
			$table->string('foto',200)->default('fam.jpg');
			$table->enum('estatus', array('Activo', 'Inactivo'))->default('Activo');
			$table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

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
		Schema::drop('familias');
	}

}
