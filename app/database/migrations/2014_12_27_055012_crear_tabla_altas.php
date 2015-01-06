<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAltas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('altas', function($t)
		{
			$t->increments('id');
			$t->integer('doc_id');
			$t->string('tipo', 20);
			$t->integer('egreso_id')->unsigned();
			//$t->foreign('egreso_id')->references('id')->on('egresos');
			$t->integer('urg_id')->unsigned();
			$t->foreign('urg_id')->references('id')->on('urgs');
			$t->integer('debito')->unsigned();
			$t->string('estatus', 20);
			$t->smallInteger('usr_id')->unsigned();
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
		Schema::drop('altas');
	}

}
