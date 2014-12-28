<?php

class Proyecto extends Eloquent
{
    //Proyecto __belongs_to__ Urg
    public function urg()
    {
        return $this->belongsTo('Urg');
    }
    
    //Proyecto __belongs_to_many Fondos
    public function fondos()
    {
        return $this->belongsToMany('Fondo');
    }
    
    //Proyecto __belongs_to_many Cuentas
    public function cuentas()
    {
        return $this->belongsToMany('Cuenta');
    }
    
    //Proyecto __belongs_to_many Disponibles
    public function disponibles()
    {
        return $this->belongsToMany('Disponible');
    }
}
