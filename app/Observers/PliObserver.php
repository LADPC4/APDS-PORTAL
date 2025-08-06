<?php

namespace App\Observers;

use App\Models\Pli;

class PliObserver
{
    /**
     * Handle the Pli "created" event.
     */
    public function created(Pli $pli): void
    {
        //
    }

    /**
     * Handle the Pli "updated" event.
     */
    public function updated(Pli $pli): void
    {
        // if ($pli->isDirty('classification_id')) {
        //     foreach ($pli->users as $user) {
        //         $user->classification_id = $pli->classification_id;
        //         $user->save();
        //     }
        // }

        if ($pli->isDirty('name')) {
            $this->syncUserName($pli);
        }
        
        if ($pli->isDirty('classification_id')) {
            $this->syncUserClassification($pli);
        }

        if ($pli->isDirty('region')) {
            $this->syncUserRegions($pli);
        }
    }

    protected function syncUserName(Pli $pli): void
    {
        foreach ($pli->users()->where('user_type', 'user')->get() as $user) {
            $user->name = $pli->name;
            $user->save();
        }
    }

    /**
     * Sync users' classification based on the PLI.
     */
    protected function syncUserClassification(Pli $pli): void
    {
        foreach ($pli->users as $user) {
            $user->classification_id = $pli->classification_id;
            $user->save();
        }
    }

    /**
     * Sync users' region array based on the PLI.
     */
    protected function syncUserRegions(Pli $pli): void
    {
        foreach ($pli->users as $user) {
            $userRegions = collect($user->region ?? []);
            $pliRegions = collect($pli->region ?? []);
            $user->region = $userRegions->merge($pliRegions)->unique()->values()->all();
            $user->save();
        }
    }

    /**
     * Handle the Pli "deleted" event.
     */
    public function deleted(Pli $pli): void
    {
        //
    }

    /**
     * Handle the Pli "restored" event.
     */
    public function restored(Pli $pli): void
    {
        //
    }

    /**
     * Handle the Pli "force deleted" event.
     */
    public function forceDeleted(Pli $pli): void
    {
        //
    }
}
