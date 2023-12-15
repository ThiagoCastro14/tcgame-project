<?php

namespace App\Providers;

use App\Models\Suporte;
use App\Observers\SuporteObserver;
use App\Repositories\Contracts\RespostaRepositoryInterface;
use App\Repositories\Contracts\SuporteRepositoryInterface;
use App\Repositories\Eloquent\RespostaSuporteRepository;
use App\Repositories\SuporteEloquentORM;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SuporteRepositoryInterface::class,
            SuporteEloquentORM::class
        );

        $this->app->bind(
            RespostaRepositoryInterface::class,
            RespostaSuporteRepository::class
        );;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Suporte::observe(SuporteObserver::class);
    }
}