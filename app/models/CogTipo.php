<?php

class CogTipo extends Eloquent
{
    //CogTipo __has_many__ Cog
    public function cogs()
    {
        return $this->hasMany('Cog');
    }
    
    //CogTipo __has_many__ ProyectoTipo
    public function proyectoTipos()
    {
        return $this->hasMany('ProyectoTipo');
    }
}
