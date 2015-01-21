<?php

class TestUsersTableSeeder extends Seeder {
    
	public function run()
	{
	    $psw = Hash::make('1234');
	    User::create(array(
	        'username' => '111',
	        'email' => 'usuario@prueba.com',
	        'password' => $psw,
	        'nombre' => 'Usuario de Prueba',
	        'cargo' => 'Cargo Prueba',
	        'prefijo' => 'Ing',
	        'iniciales' => '',
	        'remember_token' => ''
	        ));
	    
	}

}
