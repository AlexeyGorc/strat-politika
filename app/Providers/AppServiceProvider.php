<?php

namespace App\Providers;

use Auth;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('group', function (...$ids) {
            $user = Auth::user();
            if (!$user) return false;
            return in_array((int) $user->group_id, array_map('intval', $ids), true);
        });
    }
}
