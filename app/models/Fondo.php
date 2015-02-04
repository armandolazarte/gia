<?php

class Fondo extends Eloquent
{
    //Fondo __belongs_to_many Proyectos
    public function proyectos()
    {
        return $this->belongsToMany('Proyecto');
    }
    
    //Fondo __has_many__ Disponible
    public function disponibles()
    {
        return $this->hasMany('Disponible');
    }
    
    //Fondo __has_many__ SolDeposito
    public function depositos()
    {
        return $this->hasMany('SolDeposito');
    }

    //Fondo __morph_many__ Acceso
    public function accesos()
    {
        return $this->morphMany('Acceso', 'acceso');
    }
}
