<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasPresupuesto extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('urgs', function($t)
		{
			$t->increments('id');
			$t->string('urg', 50)->unique();
			$t->string('d_urg');
			$t->string('tel', 100);
			$t->string('domicilio');
			$t->timestamps();
		});
		
		Schema::create('fondos', function($t)
		{
			$t->increments('id');
			$t->string('fondo', 50)->unique();
			$t->string('d_fondo');
			$t->string('tipo', 20);
			$t->timestamps();
		});
		
		Schema::create('proyecto_tipos', function($t)
		{
			$t->increments('id');
			$t->string('proyecto_tipo', 30);
			$t->integer('cog_tipo_id')->unsigned();
		});
		
		Schema::create('proyectos', function($t)
		{
			$t->increments('id');
			$t->string('proyecto', 100)->unique();
			$t->string('d_proyecto');
			$t->decimal('monto', 15, 3);
			$t->integer('urg_id')->unsigned();
			$t->foreign('urg_id')->references('id')->on('urgs');
			$t->integer('proyecto_tipo_id')->unsigned();
			$t->foreign('proyecto_tipo_id')->references('id')->on('proyecto_tipos');
			$t->timestamps();
		});
		
		Schema::create('fondo_proyecto', function($t)
		{
			$t->increments('id');
			$t->integer('fondo_id')->unsigned();
			$t->foreign('fondo_id')->references('id')->on('fondos');
			$t->integer('proyecto_id')->unsigned();
			$t->foreign('proyecto_id')->references('id')->on('proyectos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fondo_proyecto');
		Schema::drop('proyectos');
		Schema::drop('proyecto_tipos');
		Schema::drop('fondos');
		Schema::drop('urgs');
	}

}
