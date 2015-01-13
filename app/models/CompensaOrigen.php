<?php

class CompensaOrigen extends Eloquent
{
    public $table = 'compensa_origenes';
    
    //CompensaOrigen __belongs_to__ CompensaRm
    public function compensaRm()
    {
        return $this->belongsTo('CompensaRm');
    }
    
    //CompensaOrigen __belongs_to__ Rm
    public function rm()
    {
        return $this->belongsTo('Rm');
    }
}
