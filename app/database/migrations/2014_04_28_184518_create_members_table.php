<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('miembros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('apellido',100);
			$table->string('email',100);
			$table->string('telf', 100);
			$table->enum('parentesco',array('Padre','Madre','Hij@','Herman@','Ti@','Abuel@','Otro'))->default('Padre');
			$table->string('foto');
			
			$table->enum('estatus', array('Activo', 'Inactivo'))->default('Activo');
			//relacion con la tabla de miembros
			//uno a uno
			$table->integer('familia_id')->unsigned();
			$table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade');
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
		Schema::drop('miembros');
	}

}
