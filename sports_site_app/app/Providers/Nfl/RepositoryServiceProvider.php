<?php

namespace App\Providers\Nfl;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Nfl\ITeamApiRepository;
use App\Repositories\Nfl\IStandingRepository;

use App\Repositories\Nfl\Impl\TeamApiRepository;
use App\Repositories\Nfl\Impl\StandingRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(ITeamApiRepository::class, TeamApiRepository::class);
        app()->bind(IStandingRepository::class, StandingRepository::class);
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
