<?php

namespace App\Providers;

use App\Services\InMemoryLogger;
use App\Services\PlaceHolderApiService;
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
        $this->app->singleton(PlaceHolderApiService::class, function ($app) {
            $endpoint = 'https://jsonplaceholder.typicode.com/users/1';

            return new PlaceHolderApiService($endpoint);
        });

        $this->app->singleton(InMemoryLogger::class, function ($app) {
            return new InMemoryLogger();
        });
    }
}
