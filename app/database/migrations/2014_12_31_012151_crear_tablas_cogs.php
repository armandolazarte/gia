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
		Schema::create('cog_tipos', function($t)
		{
			$t->increments('id');
			$t->string('cog_tipo', 30);
			$t->timestamps();
		});
		
		Schema::create('cogs', function($t)
		{
			$t->increments('id');
			$t->string('cog');
			$t->string('d_cog');
			$t->integer('cog_tipo_id')->unsigned();
			$t->foreign('cog_tipo_id')->references('id')->on('cog_tipos');
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
		Schema::drop('cogs');
		Schema::drop('cog_tipos');
	}

}
