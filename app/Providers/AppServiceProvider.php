<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

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
        $this->app->bind(
            \App\Contracts\TimerRepositoryInterface::class,
            \App\Repositories\TimerRepository::class
        );
        $this->app->bind(
            \App\Contracts\GroupRepositoryInterface::class,
            \App\Repositories\GroupRepository::class
        );
    }
}
