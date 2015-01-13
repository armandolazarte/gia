<?php

class CompensaRm extends Eloquent
{
    //CompensaRm __has_many__ CompensaOrigen
    public function compensaOrigenes()
    {
        return $this->hasMany('CompensaOrigen');
    }
    
    //CompensaRm __has_many__ CompensaDestino
    public function compensaDestinos()
    {
        return $this->hasMany('CompensaDestino');
    }
    
    //CompensaRm __has_many__ CompensaExterna
    public function compensaExternas()
    {
        return $this->hasMany('CompensaExterna');
    }
}
