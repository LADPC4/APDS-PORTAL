<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Logout;
use App\Listeners\FilamentLogoutRedirect;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Logout::class => [
            FilamentLogoutRedirect::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
