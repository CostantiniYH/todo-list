<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        // Appliquer une longueur par défaut aux chaînes de caractères pour éviter les problèmes avec les anciennes versions de MySQL
        Schema::defaultStringLength(191);
    }
}
