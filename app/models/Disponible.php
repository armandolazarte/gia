<?php

class Disponible extends Eloquent
{
    //Disponible __belongs_to__ Fondo
    public function fondo()
    {
        return $this->belongsTo('Fondo');
    }
    
    //Disponible __belongs_to_many__ Proyectos
    public function proyectos()
    {
        return $this->belongsToMany('Proyecto');
    }
}
