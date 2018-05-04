<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\PostRepositoryInterface::class,
            \App\Repositories\Eloquent\PostEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\CategoryEloquentRepository::class
        );
        $this->app->singleton('UserService', function () {
            return new \App\Services\UserService();
        });

    }
}
