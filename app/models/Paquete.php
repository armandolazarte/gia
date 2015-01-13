<?php

class Paquete extends Eloquent
{
    //Paquete __belongs_to_many__ Comp
    public function comps()
    {
        return $this->belongsToMany('Comp');
    }
}
