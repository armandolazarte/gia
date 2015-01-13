<?php

class OcsCondicion extends Eloquent
{
    public $table = 'ocs_condiciones';
    public $timestamps = false;
    
    //OcsCondicion __belongs_to__ Oc
    public function oc()
    {
        return $this->belongsTo('Oc')
    }
}
