<?php

class ObjActTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        Objetivo::create(array('objetivo' => '1', 'd_objetivo' => ''));
        Actividad::create(array('actividad' => '1', 'd_actividad' => ''));
    }
}