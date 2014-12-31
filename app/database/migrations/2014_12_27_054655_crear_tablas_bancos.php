<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasBancos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentas', function($t)
		{
			$t->increments('id');
			$t->smallInteger('cuenta')->unsigned()->unique();
			$t->string('no_cuenta');
			$t->string('banco');
			$t->string('tipo', 50);
			$t->boolean('activa');
			$t->integer('urg_id')->unsigned();
			$t->foreign('urg_id')->references('id')->on('urgs');
			$t->timestamps();
		});
		
		//Relación entre Cuentas Bancarias y Proyectos para FEXT
		Schema::create('cuenta_proyecto', function($t)
		{
			$t->increments('id');
			$t->integer('cuenta_id')->unsigned();
			$t->foreign('cuenta_id')->references('id')->on('cuentas');
			$t->integer('proyecto_id')->unsigned();
			$t->foreign('proyecto_id')->references('id')->on('proyectos');
			$t->timestamps();
		});
		
		Schema::create('conceptos', function($t)
		{
			$t->increments('id');
			$t->string('concepto', 100);
			$t->string('tipo', 20);
		});
		
		Schema::create('egresos', function($t)
		{
			$t->increments('id');
			$t->integer('cuenta_id')->unsigned();
			$t->foreign('cuenta_id')->references('id')->on('cuentas');
			$t->integer('poliza')->unsigned();
			$t->date('fecha');
			$t->integer('benef_id')->unsigned();
			$t->foreign('benef_id')->references('id')->on('benefs');
			$t->integer('concepto_id')->unsigned();
			$t->foreign('concepto_id')->references('id')->on('conceptos');
			$t->string('cmt');
			$t->decimal('monto', 15, 3);
			$t->string('estatus', 30);
			$t->string('responsable', 20);
			$t->date('fecha_cobro');
			$t->timestamps();
			$t->softDeletes();
		});
		
		Schema::create('ingresos', function($t)
		{
			$t->increments('id');
			$t->integer('cuenta_id')->unsigned();
			$t->foreign('cuenta_id')->references('id')->on('cuentas');
			$t->integer('poliza')->unsigned();
			$t->date('fecha');
			$t->integer('concepto_id')->unsigned();
			$t->foreign('concepto_id')->references('id')->on('conceptos');
			$t->string('cmt');
			$t->decimal('monto', 15, 3);
			$t->date('fecha_identifica');
			$t->timestamps();
			$t->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ingresos');
		Schema::drop('egresos');
		Schema::drop('conceptos');
		Schema::drop('cuenta_proyecto');
		Schema::drop('cuentas');
	}

}
