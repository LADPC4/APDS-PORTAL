<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Filament\Pages\Actions\Action;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Filament\User\Pages\Concerns\HasProfileForm;
use App\Models\Classification;
use App\Models\Region;

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
    public $user;

    public $name;
    public $email;
    public $contact_number;
    public $address;
    public $classification_id;
    public $region;
    public $status;

    public $AR1_FN;
    public $AR1_MN;
    public $AR1_LN;
    public $AR1_Designation;
    public $AR1_Contact;
    public $AR1_Email;

    public $AR2_FN;
    public $AR2_MN;
    public $AR2_LN;
    public $AR2_Designation;
    public $AR2_Contact;
    public $AR2_Email;

    public $AR3_FN;
    public $AR3_MN;
    public $AR3_LN;
    public $AR3_Designation;
    public $AR3_Contact;
    public $AR3_Email;
    

    public function mount(): void
    {
        // $user = Auth::user();

        $this->user = Auth::user()->load('classification');
        

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->contact_number = $this->user->contact_number;
        $this->address = $this->user->address;
        $this->status = $this->user->status;
        $this->classification_id = $this->user->classification_id;
        $this->region = $this->user->region;

        $this->AR1_FN = $this->user->AR1_FN;
        $this->AR1_MN = $this->user->AR1_MN;
        $this->AR1_LN = $this->user->AR1_LN;
        $this->AR1_Designation = $this->user->AR1_Designation;
        $this->AR1_Contact = $this->user->AR1_Contact;
        $this->AR1_Email = $this->user->AR1_Email;

        $this->AR2_FN = $this->user->AR2_FN;
        $this->AR2_MN = $this->user->AR2_MN;
        $this->AR2_LN = $this->user->AR2_LN;
        $this->AR2_Designation = $this->user->AR2_Designation;
        $this->AR2_Contact = $this->user->AR2_Contact;
        $this->AR2_Email = $this->user->AR2_Email;

        $this->AR3_FN = $this->user->AR3_FN;
        $this->AR3_MN = $this->user->AR3_MN;
        $this->AR3_LN = $this->user->AR3_LN;
        $this->AR3_Designation = $this->user->AR3_Designation;
        $this->AR3_Contact = $this->user->AR3_Contact;
        $this->AR3_Email = $this->user->AR3_Email;

        $this->form->fill([
            'name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'address' => $this->address,
            'classification_id' => $this->classification_id, 
            'region' => $this->region,
        ]);
    }

    protected function getFormSchema(): array
    {
        return $this->getProfileFormSchema(true); // view-only
    }

    public function getRegionNamesProperty(): array
    {
        $codes = is_array($this->region)
            ? $this->region
            : (is_string($this->region) ? json_decode($this->region, true) : []);

        return Region::whereIn('code', $codes)
            ->orderBy('name', 'asc')  // Sort by region name ascending
            ->pluck('name')
            ->toArray();
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
