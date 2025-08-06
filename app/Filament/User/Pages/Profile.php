<?php

// namespace App\Filament\User\Pages;

// use Filament\Pages\Page;

// class Profile extends Page
// {
//     protected static ?string $navigationIcon = 'heroicon-o-document-text';

//     protected static string $view = 'filament.user.pages.profile';
// }


namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Grid;
use App\Filament\User\Pages\Concerns\HasProfileForm;

class Profile extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use HasProfileForm;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function shouldRegisterNavigation(): bool
    {
        return false; // Hide this page from the sidebar completely
    }
    protected static string $view = 'filament.user.pages.profile';

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

        // $this->form->fill([
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'contact_number' => $this->contact_number,
        //     'address' => $this->address,
            
        //     'AR1_Name' => $this->AR1_Name,
        //     'AR2_Name' => $this->AR2_Name,
        //     'AR3_Name' => $this->AR3_Name,
        // ]);
        $this->form->fill($this->only([
        'name', 'email', 'contact_number', 'address', 'classification_id', 'region',
        'AR1_Name', 'AR1_Designation', 'AR1_Contact', 'AR1_Email',
        'AR2_Name', 'AR2_Designation', 'AR2_Contact', 'AR2_Email',
        'AR3_Name', 'AR3_Designation', 'AR3_Contact', 'AR3_Email',
    ]));
    }
        
    public static function getNavigationSort(): ?int
    {
        return 1; // Higher than dashboard
    }

    protected function getFormSchema(): array
    {
        return $this->getProfileFormSchema(false);
        // return [
        //     // Name full width
        //     TextInput::make('name')
        //         ->label('Institute Name')
        //         ->required()
        //         ->columnSpan('full'),  // full width of the form container

        //     // Email and Contact Number side-by-side (2 columns)
        //     Grid::make(2)
        //         ->schema([
        //             TextInput::make('email')
        //                 ->label('Official Email Address')
        //                 // ->required()
        //                 ->disabled(),

        //             TextInput::make('contact_number')
        //                 ->label('Contact Number')
        //                 ->required(),
        //         ]),

        //     // Address full width again
        //     TextInput::make('address')
        //         ->label('Address')
        //         ->required()
        //         ->columnSpan('full'),
        // ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'contact_number' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            Notification::make()
                ->title('Failed to update profile')
                ->danger()
                ->body(implode(' ', $validator->errors()->all()))
                ->send();

            return;
        }

        $user = Auth::user();
        $user->update($data);

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();

        return redirect()->route('filament.user.pages.profile-view');
    }
}
