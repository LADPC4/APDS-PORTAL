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

    public $ho1_fn;
    public $ho1_mn;
    public $ho1_ln;
    public $ho1_designation;
    public $ho1_designation_other;
    public $ho1_contact;
    public $ho1_email;

    public $ho2_fn;
    public $ho2_mn;
    public $ho2_ln;
    public $ho2_designation;
    public $ho2_designation_other;
    public $ho2_contact;
    public $ho2_email;

    public $co1_fn;
    public $co1_mn;
    public $co1_ln;
    public $co1_designation;
    public $co1_contact;
    public $co1_email;

    public $co2_fn;
    public $co2_mn;
    public $co2_ln;
    public $co2_designation;
    public $co2_contact;
    public $co2_email;

    public $lo1_fn;
    public $lo1_mn;
    public $lo1_ln;
    public $lo1_designation;
    public $lo1_contact;
    public $lo1_email;

    public $lo2_fn;
    public $lo2_mn;
    public $lo2_ln;
    public $lo2_designation;
    public $lo2_contact;
    public $lo2_email;
    

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

        $this->ho1_fn = $this->user->ho1_fn;
        $this->ho1_mn = $this->user->ho1_mn;
        $this->ho1_ln = $this->user->ho1_ln;
        $this->ho1_designation = $this->user->ho1_designation;
        $this->ho1_designation_other = $this->user->ho1_designation_other;
        $this->ho1_contact = $this->user->ho1_contact;
        $this->ho1_email = $this->user->ho1_email;

        $this->ho2_fn = $this->user->ho2_fn;
        $this->ho2_mn = $this->user->ho2_mn;
        $this->ho2_ln = $this->user->ho2_ln;
        $this->ho2_designation = $this->user->ho2_designation;
        $this->ho2_designation_other = $this->user->ho2_designation_other;
        $this->ho2_contact = $this->user->ho2_contact;
        $this->ho2_email = $this->user->ho2_email;

        $this->co1_fn = $this->user->co1_fn;
        $this->co1_mn = $this->user->co1_mn;
        $this->co1_ln = $this->user->co1_ln;
        $this->co1_designation = $this->user->co1_designation;
        $this->co1_contact = $this->user->co1_contact;
        $this->co1_email = $this->user->co1_email;

        $this->co2_fn = $this->user->co2_fn;
        $this->co2_mn = $this->user->co2_mn;
        $this->co2_ln = $this->user->co2_ln;
        $this->co2_designation = $this->user->co2_designation;
        $this->co2_contact = $this->user->co2_contact;
        $this->co2_email = $this->user->co2_email;

        $this->lo1_fn = $this->user->lo1_fn;
        $this->lo1_mn = $this->user->lo1_mn;
        $this->lo1_ln = $this->user->lo1_ln;
        $this->lo1_designation = $this->user->lo1_designation;
        $this->lo1_contact = $this->user->lo1_contact;
        $this->lo1_email = $this->user->lo1_email;

        $this->lo2_fn = $this->user->lo2_fn;
        $this->lo2_mn = $this->user->lo2_mn;
        $this->lo2_ln = $this->user->lo2_ln;
        $this->lo2_designation = $this->user->lo2_designation;
        $this->lo2_contact = $this->user->lo2_contact;
        $this->lo2_email = $this->user->lo2_email;

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
