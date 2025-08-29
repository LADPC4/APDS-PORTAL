<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pli;


class AdminDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    // protected static string $view = 'filament.resources.userresource.pages.admin-dashboard';
    protected static string $view = 'filament.user.resources.user-resource.pages.admin-dashboard';

    public $user;

    public $userStatusCounts = [];
    public $statusLabels = [];

    public function mount()
    {
        $this->user = Auth::user();

        // Count users by status
        $statuses = [
            'pending',
            'for-evaluation',
            'for-review',
            'for-approval',
            'approved',
            'rejected',
        ];

        $this->statusLabels = [
            'pending'        => 'Pending Document Submission',
            'for-evaluation' => 'For Evaluation',
            'for-review'     => 'For Review',
            'for-approval'   => 'For Approval',
            'approved'       => 'Approved',
            'rejected'       => 'Rejected',
        ];

        foreach ($statuses as $status) {
            $user = $this->user; // assign $this->user to a local variable
            if ($user && $user->isEvaluator()) {
                $count = User::where('status', $status)
                    ->where('usertype', 'user')
                    ->whereHas('plis', function ($pliQuery) use ($user) {
                        $pliQuery->whereHas('users', function ($userQuery) use ($user) {
                            $userQuery->where('users.id', $user->id);
                        });
                    })
                    ->count();
            } else {
                $count = User::where('status', $status)
                    ->where('usertype', 'user')
                    ->count();
            }

            $this->userStatusCounts[$status] = $count;
        }
        

        // $this->userStatusCounts = collect($statuses)->mapWithKeys(function ($status) {
        //     return [$status => User::where('status', $status)->count()];
        // })->toArray();
    }

    public static function getNavigationSort(): ?int
    {
        return -1; // Lower value = higher priority in nav
    }
    
    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    public function getTitle(): string
    {
        return 'Dashboard';
    }
}