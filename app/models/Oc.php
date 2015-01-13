<?php

class Oc extends Eloquent
{
    use SoftDeletingTrait;
    
    //Oc __belongs_to__ Req
    public function req()
    {
        return $this->belongsTo('Req');
    }
    
    //Oc __belongs_to__ Benef
    public function benef()
    {
        return $this->belongsTo('Benefs');
    }
    
    //Oc __has_many__ Articulo
    public function articulos()
    {
        return $this->hasMany('Articulo');
    }
    
    //Oc __has_one__ OcsCondicion
    public function condiciones()
    {
        return $this->hasOne('OcsCondicion');
    }
    
    //Oc __belongs_to_many__ Egreso
    public function egresos()
    {
        return $this->belongsToMany('Egreso');
    }
}
