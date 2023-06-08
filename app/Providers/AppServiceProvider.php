<?php

namespace App\Providers;

use App\Repositories\Phim\PhimRepository;
use App\Repositories\Phim\PhimRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

use App\Services\Phim\PhimService;
use App\Services\Phim\PhimServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //User
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );

        //Phim
        $this->app->singleton(
            PhimRepositoryInterface::class,
            PhimRepository::class
        );
        $this->app->singleton(
            PhimServiceInterface::class,
            PhimService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
