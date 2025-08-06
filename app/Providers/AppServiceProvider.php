<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use App\Models\Pli;
use App\Models\User;
use App\Observers\PliObserver;
use App\Observers\UserObserver;

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
        // Register logout event listener to redirect Filament logout to homepage
        Event::listen(Logout::class, function ($event) {
            if (request()->is('admin*') || request()->is('user*')) {
                redirect('/')->send();
            }
        });

        // Register the observer
        Pli::observe(PliObserver::class);
        User::observe(UserObserver::class);
    }
}
