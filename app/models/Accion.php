<?php

class Accion extends Eloquent
{
    public $table = 'acciones';
    public $timestamps = false;

    //Accion __belongs_to_many__ Modulo
    public function modulos()
    {
        return $this->belongsToMany('Modulo');
    }
}
