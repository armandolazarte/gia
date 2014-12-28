<?php

class SolDepositosDoc extends Eloquent
{
    //SolDepositosDoc __belongs_to__ SolDeposito
    public function solDeposito()
    {
        return $this->belongsTo('SolDeposito');
    }
}
