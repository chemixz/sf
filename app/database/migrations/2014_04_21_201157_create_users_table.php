<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('login',40);
			$table->string('clave');
			$table->string('email',100);
			$table->enum('rol', array('Administrador', 'Usuario'))->default('Usuario');
			$table->enum('estatus', array('Activo', 'Inactivo'))->default('Activo');
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
		Schema::drop('usuarios');
	}

}
