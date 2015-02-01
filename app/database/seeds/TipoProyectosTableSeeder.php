<?php

class TipoProyectosTableSeeder extends Seeder {

    public function run()
    {
        TipoProyecto::create(array('tipo_proyecto' => 'P3E-LGCG'));
        TipoProyecto::create(array('tipo_proyecto' => 'P3E 2011 y Anteriores'));
    }
}