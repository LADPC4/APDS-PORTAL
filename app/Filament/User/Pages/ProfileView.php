<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Filament\Pages\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Filament\User\Pages\Concerns\HasProfileForm;
use Illuminate\Support\Facades\Auth;

class ProfileView extends Page implements HasForms
{
    use InteractsWithForms;
    use HasProfileForm;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Profile';
    protected static ?string $title = 'Profile';
    protected static string $view = 'filament.user.pages.profile-view';
        
    public static function getNavigationSort(): ?int
    {
        return 1; // Higher than dashboard
    }

    public $name;
    public $email;
    public $contact_number;
    public $address;
    public $classification_id;
    public $region;

    public $AR1_Name;
    public $AR1_Designation;
    public $AR1_Contact;
    public $AR1_Email;

    public $AR2_Name;
    public $AR2_Designation;
    public $AR2_Contact;
    public $AR2_Email;

    public $AR3_Name;
    public $AR3_Designation;
    public $AR3_Contact;
    public $AR3_Email;
    

    public function mount(): void
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->contact_number = $user->contact_number;
        $this->address = $user->address;
        $this->classification_id = $user->classification_id;
        $this->region = $user->region;

        $this->AR1_Name = $user->AR1_Name;
        $this->AR1_Designation = $user->AR1_Designation;
        $this->AR1_Contact = $user->AR1_Contact;
        $this->AR1_Email = $user->AR1_Email;

        $this->AR2_Name = $user->AR2_Name;
        $this->AR2_Designation = $user->AR2_Designation;
        $this->AR2_Contact = $user->AR2_Contact;
        $this->AR2_Email = $user->AR2_Email;

        $this->AR3_Name = $user->AR3_Name;
        $this->AR3_Designation = $user->AR3_Designation;
        $this->AR3_Contact = $user->AR3_Contact;
        $this->AR3_Email = $user->AR3_Email;

        $this->form->fill([
            'name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'address' => $this->address,
        ]);
    }

    protected function getFormSchema(): array
    {
        return $this->getProfileFormSchema(true); // view-only
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->label('Edit Profile')
                ->icon('heroicon-o-pencil')
                ->url(route('filament.user.pages.profile')) // adjust route name if different
                ->openUrlInNewTab(false),
        ];
    }
}
