<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Consts\NFL\ApiEndPointConsts;
use App\Consts\NFL\ColumnNameConsts;

class ConstServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ApiEndPointConsts', function ($app) {
            return ApiEndPointConsts::class;
        });
        $this->app->singleton('ColumnNameConsts', function ($app) {
            return ColumnNameConsts::class;
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
