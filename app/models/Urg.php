<?php

class Urg extends Eloquent
{
    //Urg __has_many__ Proyecto
    public function proyectos()
    {
        return $this->hasMany('Proyecto');
    }
    
    //Urg __has_many__ Cuenta
    public function cuentas()
    {
        return $this->hasMany('Cuenta');
    }
    
    //Urg __has_many__ Alta
    public function altas()
    {
        return $this->hasMany('Alta');
    }
}