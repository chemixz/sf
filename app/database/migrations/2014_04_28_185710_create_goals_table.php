<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('descripcion');
			$table->double('metabs',15,2);
			$table->date('fecha_limite')->default(date('Y-m-d'));
			$table->integer('prioridad')->unsigned()->default(0);
			$table->integer('miembro_id')->unsigned();
			$table->foreign('miembro_id')->references('id')->on('miembros')->onDelete('cascade');
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
		Schema::drop('metas');
	}

}
