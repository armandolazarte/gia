<?php

namespace Gia\Providers;

use Illuminate\Support\ServiceProvider;

class ConsecutivoServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('consecutivo', 'Gia\Classes\Consecutivo');
    }
}