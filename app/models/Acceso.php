<?php

class Acceso extends Eloquent
{
    //Acceso __belongs_to__ User
    public function user()
    {
        return $this->belongsTo('User');
    }

    //Acceso __morph_to__ TipoProyecto Fondo Urg Proyecto
    public function acceso()
    {
        return $this->morphTo();
    }
}