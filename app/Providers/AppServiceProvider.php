<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // On force Laravel à considérer qu'on est en production si on est sur Alwaysdata
        if (str_contains(request()->getHost(), 'alwaysdata.net')) {
            app()->detectEnvironment(fn() => 'production');
        }

        // Force le HTTPS pour ne pas avoir d'erreurs de sécurité
        if (app()->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Force le schéma HTTPS si on n'est pas en local
        if (config('app.env') === 'production' || !app()->isLocal()) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
