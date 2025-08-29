<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.user.pages.user-dashboard';

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
        return 'Home';
    }

    public function getTitle(): string
    {
        // return 'Welcome!';
        return 'Home';
    }
}