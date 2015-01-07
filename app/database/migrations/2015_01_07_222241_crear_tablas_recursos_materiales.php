<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasRecursosMateriales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividades', function($t)
		{
			$t->increments('id');
			$t->integer('actividad')->unsigned();
			$t->text('d_actividad');
		});
		
		Schema::create('objetivos', function($t)
		{
			$t->increments('id');
			$t->integer('objetivo')->unsigned();
			$t->text('d_objetivo');
		});
		
		Schema::create('rms', function($t)
		{
			$t->increments('id');
			$t->integer('rm');
			$t->integer('proyecto_id')->unsigned();
			$t->foreign('proyecto_id')->references('id')->on('proyectos');
			$t->integer('objetivo_id')->unsigned();
			$t->integer('actividad_id')->unsigned();
			$t->integer('cog_id')->unsigned();
			$t->foreign('cog_id')->references('id')->on('cogs');
			$t->integer('fondo_id')->unsigned();
			$t->foreign('fondo_id')->references('id')->on('fondos');
			$t->decimal('monto', 15, 3);
			$t->text('d_rm');
			$t->timestamps();
		});
		
		Schema::create('bms_rms', function($t)
		{
			$t->increments('id');
			$t->integer('rm_id')->unsigned();
			$t->string('bms', 50);
		});
		
		Schema::create('ingreso_rm', function($t)
		{
			$t->increments('id');
			$t->integer('ingreso_id')->unsigned();
			$t->integer('rm_id')->unsigned();
			$t->decimal('monto', 15, 3);
			$t->timestamps();
		});
		
		Schema::create('egreso_rm', function($t)
		{
			$t->increments('id');
			$t->integer('egreso_id')->unsigned();
			$t->integer('rm_id')->unsigned();
			$t->decimal('monto', 15, 3);
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
		Schema::drop('egreso_rm');
		Schema::drop('ingreso_rm');
		Schema::drop('bms_rms');
		Schema::drop('rms');
		Schema::drop('objetivos');
		Schema::drop('actividades');
	}

}
