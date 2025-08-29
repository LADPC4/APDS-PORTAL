<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Activitylog\Facades\Activity;
use App\Models\User;

class LogRegisteredUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    // public function handle(Registered $event): void
    // {
    //     //
    // }
    
    // public function handle(Registered $event): void
    // {
    //     /** @var User $user */
    //     $user = $event->user; // cast to your User model

    //     activity()
    //         ->causedBy($user)
    //         ->event('Registered')
    //         ->log('User with Email: "' . $user->email . '" successfully registered an account');
    // }

    
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        /** @var User $user */
        $user = $event->user;

        // Define labels for the fields you want to log
        $fieldLabels = [
            'name' => 'Institute Name',
            'email' => 'Official Email Address',
            'contact_number' => 'Contact Number',
            'address' => 'Main Office Address',
            'classification_id' => 'Classification',
            'region' => 'Regions Covered',
        ];

        // Build properties array with labels and values
        $properties = [];
        foreach ($fieldLabels as $field => $label) {
            $value = $user->$field;

            // Convert arrays (like region) to comma-separated string
            if (is_array($value)) {
                $value = implode(', ', $value);
            }

            $properties[$label] = $value;
        }

        activity()
            ->causedBy($user)
            ->event('Registered')
            ->performedOn($user)
            ->withProperties($properties)
            ->log('New user registration'); // Main log message
    }
}
