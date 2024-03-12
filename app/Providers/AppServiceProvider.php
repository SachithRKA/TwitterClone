<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive(); // Website now have multiple pages, where the
        // the user don;t ahve to scroll down a lot.

        try {
            \DB::connection()->getPDO();
            dump('Database connected: ' . \DB::connection()->getDatabaseName());
        }

        catch (\Exception $e) {
            dump('Database connected: ' . 'None');
        }
    }
}
