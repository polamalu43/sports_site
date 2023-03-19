<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libraries\Api\ProductApiWithCurl;

class LibraryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ProductApiWithCurl', function ($app) {
            return new ProductApiWithCurl();
        });
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
