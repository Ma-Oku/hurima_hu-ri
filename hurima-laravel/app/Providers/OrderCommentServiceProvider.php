<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OrderCommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'OrderCommentService',
            'App\Services\OrderCommentService'
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
