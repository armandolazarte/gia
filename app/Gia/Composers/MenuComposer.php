<?php
/**
 * Created by PhpStorm.
 * User: Samuel Mercado
 * Date: 14/01/2015
 * Time: 02:50 PM
 */

namespace Gia\Composers;


use Illuminate\Support\Collection;

class MenuComposer {

    var $modulos;

    public function __construct(\Modulo $modulos)
    {
        $this->modulos = $modulos->orderBy('orden')->get();
    }

    public function compose($view)
    {
        //\Modulo::all()
        $view->with('modulos', $this->modulos);
    }
}