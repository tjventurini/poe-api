<?php

namespace Tjventurini\PoeApi;

use Illuminate\Support\ServiceProvider;

class PoeApiServiceProvider extends ServiceProvider
{
    /**
     * Boot method of this service provider.
     *
     * @return void
     */
    public function boot()
    {
        ddi('boot');
        // merge config from package with instance
        $this->mergeConfigFrom(__DIR__ . '../config/poe-api.php', 'poe-api');
    }

    /**
     * Register method of this service provider.
     *
     * @return void
     */
    public function register()
    {
        ddi('register');
        // add binding for PoeApi for facade
        $this->app->bind('poe-api', function ($app) {
            // get values from config
            $api_url = config('poe-api.api_url');
            $stashes_url = config('poe-api.stashes_url');

            // return instance of PoeApi
            return new \Tjventurini\PoeApi\Services\PoeApiService($api_url, $stashes_url);
        });
    }
}