<?php

class Modulo extends Eloquent
{
    //Modulo __belongs_to_many__ Roles
    public function roles()
    {
        return $this->belongsToMany('Rol');
    }
}
