<?php

namespace CursoLaravel\Providers;

use CursoLaravel\Repositories\ClientRepository;
use CursoLaravel\Repositories\ClientRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class CursoLaravelRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ClientRepository::class,
            ClientRepositoryEloquent::class
        );
    }
}
