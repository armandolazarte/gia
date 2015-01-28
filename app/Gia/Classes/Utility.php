<?php
/**
 * Created by PhpStorm.
 * User: Samuel Mercado
 * Date: 27/01/2015
 * Time: 03:14 PM
 */

namespace Gia\Classes;


class Utility
{
    public static function removerComa($numero) {
        $numero_sin_coma = "";
        $arr_num = explode(",", $numero);
        foreach ($arr_num AS $n)
        {
            $numero_sin_coma .= $n;
        }
        return  $numero_sin_coma;
    }
}