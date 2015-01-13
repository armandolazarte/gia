<?php

class CompensaExterna extends Eloquent
{
    //CompensaExterna __belongs_to__ CompensaRm
    public function compensaRm()
    {
        return $this->belongsTo('CompensaRm');
    }
    
    //CompensaExterna __belongs_to__ UrgExterna
    public function urgExterna()
    {
        return $this->belongsTo('UrgExterna');
    }
}
