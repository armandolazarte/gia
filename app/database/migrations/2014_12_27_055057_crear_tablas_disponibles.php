<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasDisponibles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disponibles', function($t)
		{
			$t->increments('id');
			$t->integer('fondo_id')->unsigned();
			$t->foreign('fondo_id')->references('id')->on('fondos');
			$t->decimal('monto', 15, 3);
			$t->date('fecha');
			$t->string('obs');
			$t->integer('afin_ejecutora')->unsigned();
			$t->integer('no_t')->unsigned();
			$t->timestamps();
		});
		
		Schema::create('disponible_proyecto', function($t)
		{
			$t->increments('id');
			$t->integer('disponible_id')->unsigned();
			$t->foreign('disponible_id')->references('id')->on('disponibles');
			$t->integer('proyecto_id')->unsigned();
			$t->foreign('proyecto_id')->references('id')->on('proyectos');
			$t->decimal('monto', 15, 3);
			$t->integer('no_invoice')->unsigned();
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('disponible_proyecto');
		Schema::drop('disponibles');
	}

}
