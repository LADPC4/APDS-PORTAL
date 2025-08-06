<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // if ($user->isDirty('classification_id')) {
        //     foreach ($user->plis as $pli) {
        //         $pli->classification_id = $user->classification_id;
        //         $pli->save();
        //     }
        // }
        
        if ($user->user_type !== 'user') return;

        if ($user->isDirty('name')) {
            $this->syncPliName($user);
        }

        if ($user->isDirty('classification_id')) {
            $this->syncPliClassification($user);
        }

        if ($user->isDirty('region')) {
            $this->syncPliRegions($user);
        }
    }

    protected function syncPliName(User $user): void
    {
        foreach ($user->plis as $pli) {
            $pli->name = $user->name;
            $pli->save();
        }
    }

    /**
     * Sync PLI classification_id from the User.
     */
    protected function syncPliClassification(User $user): void
    {
        foreach ($user->plis as $pli) {
            $pli->classification_id = $user->classification_id;
            $pli->save();
        }
    }

    /**
     * Sync PLI region array from the User.
     */
    protected function syncPliRegions(User $user): void
    {
        foreach ($user->plis as $pli) {
            $pliRegions = collect($pli->region ?? []);
            $userRegions = collect($user->region ?? []);
            $pli->region = $pliRegions->merge($userRegions)->unique()->values()->all();
            $pli->save();
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
