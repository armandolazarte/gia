<?php

class CompensaDestino extends Eloquent
{
    //CompensaDestino __belongs_to__ CompensaRm
    public function compensaRm()
    {
        return $this->belongsTo('CompensaRm');
    }
    
    //CompensaDestino __belongs_to__ Rm
    public function rm()
    {
        return $this->belongsTo('Rm');
    }
}