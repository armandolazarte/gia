<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('TestUsersTableSeeder');
		$this->call('ModulosTableSeeder');
		$this->call('TipoProyectosTableSeeder');
		$this->call('ObjActTableSeeder');
		$this->call('UnidadesTableSeeder');
	}

}
