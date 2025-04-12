<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Http\Middleware\CheckRole;

use App\Models\User;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind settings as a singleton so it's loaded only once per request
        $this->app->singleton('app.settings', function () {
            // Check if the settings table exists before querying
            if (Schema::hasTable('settings')) {
                return Setting::pluck('value', 'slug')->toArray();
            }

            return [];
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Superadmin') ? true : null;
        });
    }
}
