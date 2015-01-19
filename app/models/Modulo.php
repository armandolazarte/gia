<?php

class Modulo extends Eloquent
{
    public $timestamps = false;

    //Modulo __belongs_to_many__ Role
    public function roles()
    {
        return $this->belongsToMany('Role');
    }

    //Modulo __belongs_to_many__ Accion
    public function acciones()
    {
        return $this->belongsToMany('Accion');
    }
}
