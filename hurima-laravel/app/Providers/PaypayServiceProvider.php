<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PaypayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'PaypayService',
            'App\Services\PaypayService'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
