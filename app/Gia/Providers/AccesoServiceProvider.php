<?php

namespace Gia\Providers;

use Illuminate\Support\ServiceProvider;

class AccesoServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('acceso', 'Gia\Classes\Acceso');
    }
}