<?php

class SolDeposito extends Eloquent
{
    //SolDeposito __belongs_to__ Fondo
    public function fondo()
    {
        return $this->belongsTo('Fondo');
    }
    
    //SolDeposito __has_many__ SolDepositosDoc
    public function solDepositosDocs()
    {
        return $this->hasMany('SolDepositosDoc');
    }
}
