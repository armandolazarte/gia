<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasProveedores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proveedores', function($t)
		{
			$t->increments('id');
		    $t->integer('benef_id')->unsigned();
		    $t->foreign('benef_id')->references('id')->on('benefs');
		    $t->string('nombre_comercial');
		    $t->string('rfc', 15);
		    $t->string('direccion');
		    $t->string('ciudad', 100);
		    $t->string('estado', 100);
		    $t->string('cp', 6);
		    $t->string('tel', 100);
		    $t->string('contacto');
		    $t->string('representante');
		    $t->timestamps();
		});
		
		Schema::create('giros', function($t)
		{
			$t->increments('id');
			$t->string('giro', 50);
		});
		
		Schema::create('giro_proveedor', function($t)
		{
			$t->increments('id');
			$t->integer('proveedor_id')->unsigned();
			$t->foreign('proveedor_id')->references('id')->on('proveedores');
			$t->integer('giro_id')->unsigned();
			$t->foreign('giro_id')->references('id')->on('giros');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('giro_proveedor');
		Schema::drop('proveedores');
		Schema::drop('giros');
	}

}
