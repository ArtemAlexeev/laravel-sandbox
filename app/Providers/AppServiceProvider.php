<?php

namespace App\Providers;

use App\Models\UserLink;
use Illuminate\Support\Facades\Route;
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
        //
        Route::bind('hash', function ($value) {
            return UserLink::whereHash($value)
                ->where('expired_at', '>', now())
                ->firstOrFail();
        });
    }
}
