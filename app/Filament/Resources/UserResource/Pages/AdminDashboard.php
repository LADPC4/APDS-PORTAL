<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    // protected static string $view = 'filament.resources.userresource.pages.admin-dashboard';
    protected static string $view = 'filament.user.resources.user-resource.pages.admin-dashboard';


    public $user;

    public function mount()
    {
        $this->user = Auth::user();
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