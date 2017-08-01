<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Http\Controllers\IRepository\UserRepositoryInterface',
                        'App\Http\Controllers\Repository\UserRepository');

        $this->app->bind('App\Http\Controllers\IService\UserServiceInterface',
                        'App\Http\Controllers\Service\UserService');

        $this->app->bind('App\Http\Controllers\IRepository\AuthorityRepositoryInterface',
                        'App\Http\Controllers\Repository\AuthorityRepository');
    }
}
