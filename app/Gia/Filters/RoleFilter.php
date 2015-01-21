<?php
/**
 * Created by PhpStorm.
 * User: Samuel Mercado
 * Date: 20/01/2015
 * Time: 07:12 PM
 */

namespace Gia\Filters;

class RoleFilter
{

    public function filter()
    {
        //if(Auth::guest()) return Redirect::guest('login');

        $user = \Auth::user();

        //Determinar ruta para determinar acción
        $ruta_actual = \Route::current()->getUri();
        $accion = \Accion::whereRuta($ruta_actual)->with('modulos')->get();

        //Consultar modulo(s) al que pertenece la acción
        $modulos_accion = $accion[0]->modulos;

        //Consultar roles que permiten el acceso al modulo
        foreach($modulos_accion as $modulo){
            $arr_roles_id_modulo[] = $modulo->roles[0]->id;
        }

        //Consultar roles del usuario
        $roles_usuario = $user->roles;
        foreach($user->roles as $role){
            $arr_roles_id_usuario[] = $role->id;
        }

        //Validar roles del usuario contra roles del módulo
        $arr_validacion = array_intersect($arr_roles_id_usuario, $arr_roles_id_modulo);

        if ( count($arr_validacion) == 0) {
            /**
             * @todo Redireccionar a página de inicio del usuario
             */
            return \Redirect::to('/')->with('flash_message', 'No tiene los derechos para acceder a este módulo');
        }
    }
}