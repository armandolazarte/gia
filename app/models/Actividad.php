<?php

class Actividad extends Eloquent
{
    public $table = 'actividades';
    public $timestamps = false;
    
    //Actividad __has_many__ Rm
    public function rms()
    {
        return $this->hasMany('Rm');
    }
}
