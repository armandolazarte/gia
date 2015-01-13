<?php

class SolicitudDev extends Eloquent
{
    //SolicitudDev __belongs_to__ Solicitud
    public function solicitud()
    {
        return $this->belongsTo('Solicitud');
    }
}
