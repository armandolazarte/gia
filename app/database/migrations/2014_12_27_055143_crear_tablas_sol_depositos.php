<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasSolDepositos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sol_depositos', function($t)
		{
			$t->increments('id');
			$t->date('fecha');
			$t->string('estatus', 20);
			$t->integer('fondo_id')->unsigned();
			$t->foreign('fondo_id')->references('id')->on('fondos');
			$t->integer('afin_soldep')->unsigned();
			$t->timestamps();
		});
		
		Schema::create('sol_depositos_docs', function($t)
		{
			$t->increments('id');
			$t->integer('sol_deposito_id')->unsigned();
			$t->foreign('sol_deposito_id')->references('id')->on('sol_depositos');
			$t->integer('doc_id')->unsigned();
			$t->string('doc_type');
			$t->decimal('monto', 15, 3);
			$t->decimal('monto_retencion', 15, 3);
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
		Schema::drop('sol_depositos_docs');
		Schema::drop('sol_depositos');
	}

}
