<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username', 20)->unique();
			$table->string('email', 128)->unique();
			$table->string('password', 60);
			
			$table->string('nombre');
			$table->string('cargo');
			$table->string('prefijo', 5);
			$table->string('iniciales', 5);
			
			$table->string('remember_token');
			$table->boolean('active');
			$table->boolean('validated');
			
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
		Schema::drop('users');
	}

}
