<?php

class RolesTableSeeder extends Seeder {
    
	public function run()
	{
	    
	    Role::create(array('role_name' => 'Administrador'));
	    Role::create(array('role_name' => 'Usuario'));
	    Role::create(array('role_name' => 'Adquisiciones'));
	    Role::create(array('role_name' => 'Patrimonio'));
	    Role::create(array('role_name' => 'Directivo'));
	    Role::create(array('role_name' => 'Recepción'));
	    Role::create(array('role_name' => 'Presupuesto'));
	    Role::create(array('role_name' => 'Contabilidad'));
	    Role::create(array('role_name' => 'Bancos'));
	    Role::create(array('role_name' => 'FEXt'));
	    Role::create(array('role_name' => 'DMCYP - DIP'));
	}

}
