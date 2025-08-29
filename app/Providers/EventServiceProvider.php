<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use App\Listeners\FilamentLogoutRedirect;
use App\Listeners\LogRegisteredUser;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Logout::class => [
            FilamentLogoutRedirect::class,
        ],

        Registered::class => [       
            LogRegisteredUser::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
