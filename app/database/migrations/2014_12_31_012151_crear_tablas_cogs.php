<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablasCogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cogs', function($table)
		{
			$table->increments('id');
			$table->integer('proyecto_tipo_id')->unsigned();
			$table->foreign('proyecto_tipo_id')->references('id')->on('proyecto_tipos');
			$table->string('cog');
			$table->string('d_cog');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cogs');
	}

}
