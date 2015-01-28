<?php

namespace Gia\Providers;

use Illuminate\Support\ServiceProvider;

class UtilityServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('utility', 'Gia\Classes\Utility');
    }
}