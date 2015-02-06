<?php

namespace Gia\Providers;

use Illuminate\Support\ServiceProvider;

class FiltroAccesoServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('filtro_acceso', 'Gia\Classes\FiltroAcceso');
    }
}