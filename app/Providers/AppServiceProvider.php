<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        // Activamos las rutas del archivo routes/api.php con prefijo /api
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));
    }
}