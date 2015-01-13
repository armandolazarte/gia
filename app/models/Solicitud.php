<?php

class Solicitud extends Eloquent
{
    public $table = 'solicitudes';
    
    //Solicitud __belongs_to__ Benef
    public function benef()
    {
        return $this->belongsTo('Benef');
    }
    
    //Solicitud __belongs_to__ Urg
    public function urg()
    {
        return $this->belongsTo('Urg');
    }
    
    //Solicitud __belongs_to__ Proyecto
    public function proyecto()
    {
        return $this->belongsTo('Proyecto');
    }
    
    //Solicitud __has_many__ SolicitudDev
    public function solicitudDevs()
    {
        return $this->hasMany('SolicitudDev');
    }
    
    //Solicitud __belongs_to_many__ Egreso
    public function egresos()
    {
        return $this->belongsToMany('Egreso');
    }
    
    //Solicitud __belongs_to_many__ Factura
    public function facturas()
    {
        return $this->belongsToMany('Factura');
    }
    
    //Solicitud __belongs_to_many__ Rm
    public function rms()
    {
        return $this->belongsToMany('Rm')->withPivot('monto');
    }
    
    //Solicitud __belongs_to_many__ Objetivo
    public function objetivos()
    {
        return $this->belongsToMany('Objetivo')->withPivot('monto');
    }
}
