<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\RedirectResponse;

class FilamentLogoutRedirect
{
    public function handle(Logout $event)
    {
        if (request()->is('admin*') || request()->is('user*')) {
            // Redirect after logout from Filament admin/user panel
            session()->flash('status', 'Logged out successfully.');
            return redirect('/')->send();
        }
    }
}
