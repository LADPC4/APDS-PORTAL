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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Filament\Notifications\Notification;
use App\Filament\User\Pages\Concerns\HasProfileForm;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use App\Models\Region;

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
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->contact_number = $user->contact_number;
        $this->address = $user->address;
        $this->classification_id = $user->classification_id;
        $this->region = $user->region;

        $this->AR1_FN = $user->AR1_FN;
        $this->AR1_MN = $user->AR1_MN;
        $this->AR1_LN = $user->AR1_LN;
        $this->AR1_Designation = $user->AR1_Designation;
        $this->AR1_Contact = $user->AR1_Contact;
        $this->AR1_Email = $user->AR1_Email;

        $this->AR2_FN = $user->AR2_FN;
        $this->AR2_MN = $user->AR2_MN;
        $this->AR2_LN = $user->AR2_LN;
        $this->AR2_Designation = $user->AR2_Designation;
        $this->AR2_Contact = $user->AR2_Contact;
        $this->AR2_Email = $user->AR2_Email;

        $this->AR3_FN = $user->AR3_FN;
        $this->AR3_MN = $user->AR3_MN;
        $this->AR3_LN = $user->AR3_LN;
        $this->AR3_Designation = $user->AR3_Designation;
        $this->AR3_Contact = $user->AR3_Contact;
        $this->AR3_Email = $user->AR3_Email;

        $this->ho1_fn = $user->ho1_fn;
        $this->ho1_mn = $user->ho1_mn;
        $this->ho1_ln = $user->ho1_ln;
        $this->ho1_designation = $user->ho1_designation;
        $this->ho1_designation_other = $user->ho1_designation_other;
        $this->ho1_contact = $user->ho1_contact;
        $this->ho1_email = $user->ho1_email;

        $this->ho2_fn = $user->ho2_fn;
        $this->ho2_mn = $user->ho2_mn;
        $this->ho2_ln = $user->ho2_ln;
        $this->ho2_designation = $user->ho2_designation;
        $this->ho2_designation_other = $user->ho2_designation_other;
        $this->ho2_contact = $user->ho2_contact;
        $this->ho2_email = $user->ho2_email;

        $this->co1_fn = $user->co1_fn;
        $this->co1_mn = $user->co1_mn;
        $this->co1_ln = $user->co1_ln;
        $this->co1_designation = $user->co1_designation;
        $this->co1_contact = $user->co1_contact;
        $this->co1_email = $user->co1_email;

        $this->co2_fn = $user->co2_fn;
        $this->co2_mn = $user->co2_mn;
        $this->co2_ln = $user->co2_ln;
        $this->co2_designation = $user->co2_designation;
        $this->co2_contact = $user->co2_contact;
        $this->co2_email = $user->co2_email;

        $this->lo1_fn = $user->lo1_fn;
        $this->lo1_mn = $user->lo1_mn;
        $this->lo1_ln = $user->lo1_ln;
        $this->lo1_designation = $user->lo1_designation;
        $this->lo1_contact = $user->lo1_contact;
        $this->lo1_email = $user->lo1_email;

        $this->lo2_fn = $user->lo2_fn;
        $this->lo2_mn = $user->lo2_mn;
        $this->lo2_ln = $user->lo2_ln;
        $this->lo2_designation = $user->lo2_designation;
        $this->lo2_contact = $user->lo2_contact;
        $this->lo2_email = $user->lo2_email;

        $this->form->fill($this->only([
        'name', 'email', 'contact_number', 'address', 'classification_id', 'region',
        'AR1_FN', 'AR1_MN', 'AR1_LN', 'AR1_Designation', 'AR1_Contact', 'AR1_Email',
        'AR2_FN', 'AR2_MN', 'AR2_LN', 'AR2_Designation', 'AR2_Contact', 'AR2_Email',
        'AR3_FN', 'AR3_MN', 'AR3_LN', 'AR3_Designation', 'AR3_Contact', 'AR3_Email',
        
        // HO1 & HO2
        'ho1_fn','ho1_mn','ho1_ln','ho1_designation','ho1_designation_other','ho1_contact','ho1_email',
        'ho2_fn','ho2_mn','ho2_ln','ho2_designation','ho2_designation_other','ho2_contact','ho2_email',
        // CO1 & CO2
        'co1_fn','co1_mn','co1_ln','co1_designation','co1_contact','co1_email',
        'co2_fn','co2_mn','co2_ln','co2_designation','co2_contact','co2_email',
        // LO1 & LO2
        'lo1_fn','lo1_mn','lo1_ln','lo1_designation','lo1_contact','lo1_email',
        'lo2_fn','lo2_mn','lo2_ln','lo2_designation','lo2_contact','lo2_email',
    ]));
    }
        
    public static function getNavigationSort(): ?int
    {
        return 1; // Higher than dashboard
    }

    protected function getFormSchema(): array
    {
        // return $this->getProfileFormSchema(false);
        
        return [
            
    Forms\Components\Section::make('Institute Profile')
        ->schema([
            Grid::make(1)->schema([
                Fieldset::make('Institute Details')->schema([
                    TextInput::make('name')
                        ->label('Institute Name')
                        ->required()
                        
                        ->columnSpan('full'),

                    Grid::make(2)->schema([

                        Select::make('classification_id')
                            ->label('Classification')
                            ->options(\App\Models\Classification::orderBy('name')->pluck('name', 'id')->toArray())
                            ->required()
                            
                            ->searchable(),
                            
                        Select::make('region')
                            ->label('Regions Covered')
                            ->multiple()
                            ->options(
                                Region::query()
                                    ->orderBy('code')
                                    ->pluck('code', 'code') // ['CAR' => 'CAR', 'R01' => 'R01', etc.]
                                    ->toArray()
                            )
                            
                            ->preload()
                            ->searchable()
                            ->required(),
                    ]),

                    Grid::make(2)->schema([
                        TextInput::make('email')
                            ->label('Official Email Address')
                            // ->disabled(true)
                            ->readonly(),

                        TextInput::make('contact_number')
                            ->label('Contact Number')
                            ->required()
                            ,
                    ]),

                    TextInput::make('address')
                        ->label('Main Office Address')
                        ->required()
                        
                        ->columnSpan('full'),
                
                ])
            ]),

            Grid::make(3)->schema([
                    Fieldset::make('Authorized Representative 1')->schema([
                        TextInput::make('AR1_FN')->label('First Name')->columnSpan('full'),
                        TextInput::make('AR1_MN')->label('Middle Name')->columnSpan('full'),
                        TextInput::make('AR1_LN')->label('Last Name')->columnSpan('full'),
                        TextInput::make('AR1_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR1_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR1_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 2')->schema([
                        // TextInput::make('AR2_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR2_FN')->label('First Name')->columnSpan('full'),
                        TextInput::make('AR2_MN')->label('Middle Name')->columnSpan('full'),
                        TextInput::make('AR2_LN')->label('Last Name')->columnSpan('full'),
                        TextInput::make('AR2_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR2_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR2_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),

                    Fieldset::make('Authorized Representative 3')->schema([
                        // TextInput::make('AR3_Name')->label('Name')->columnSpan('full'),
                        TextInput::make('AR3_FN')->label('First Name')->columnSpan('full'),
                        TextInput::make('AR3_MN')->label('Middle Name')->columnSpan('full'),
                        TextInput::make('AR3_LN')->label('Last Name')->columnSpan('full'),
                        TextInput::make('AR3_Designation')->label('Designation or Position')->columnSpan('full'),
                        TextInput::make('AR3_Contact')->label('Contact Number')->columnSpan('full'),
                        TextInput::make('AR3_Email')->label('Email')->email()->columnSpan('full'),
                    ])
                    ->columnSpan(1),
                ]),

                Grid::make(2) // Outer grid, 2 columns for the 2 fieldsets
                    ->schema([

                        // ================= Head Officer 1 =================
                        Fieldset::make('Head Officer 1')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('ho1_fn')->label('First Name')->columnSpan('full')->required(),
                                        TextInput::make('ho1_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('ho1_ln')->label('Last Name')->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        Select::make('ho1_designation')->label('Designation')
                                            ->options([
                                                'President' => 'President',
                                                'Vice President' => 'Vice President',
                                                'Executive Vice President' => 'Executive Vice President',
                                                'Senior Vice President' => 'Senior Vice President',
                                                'Chairman/Chairwoman' => 'Chairman/Chairwoman',
                                                'General Manager' => 'General Manager',
                                                'Other' => 'Other',
                                            ])
                                            ->reactive()
                                            ->columnSpan('full')
                                            ->required()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                // Clear the "Other" input immediately when designation is not 'Other'
                                                if ($state !== 'Other') {
                                                    $set('ho1_designation_other', null);
                                                }
                                            }),

                                        TextInput::make('ho1_designation_other')
                                            ->label('Other Designation')
                                            ->reactive()
                                            ->visible(fn ($get) => $get('ho1_designation') === 'Other')
                                            ->required(fn ($get) => $get('ho1_designation') === 'Other')
                                            ->dehydrateStateUsing(fn ($state, $get) => $get('ho1_designation') === 'Other' ? $state : null)
                                            ->columnSpan('full'),

                                        TextInput::make('ho1_contact')->label('Contact Number')->columnSpan('full')->required(),
                                        TextInput::make('ho1_email')->label('Email')->email()->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),

                        // ================= Head Officer 2 =================
                        Fieldset::make('Head Officer 2')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('ho2_fn')->label('First Name')->columnSpan('full'),
                                        TextInput::make('ho2_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('ho2_ln')->label('Last Name')->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        Select::make('ho2_designation')->label('Designation')
                                            ->options([
                                                'President' => 'President',
                                                'Vice President' => 'Vice President',
                                                'Executive Vice President' => 'Executive Vice President',
                                                'Senior Vice President' => 'Senior Vice President',
                                                'Chairman/Chairwoman' => 'Chairman/Chairwoman',
                                                'General Manager' => 'General Manager',
                                                'Other' => 'Other',
                                            ])
                                            ->reactive()
                                            ->columnSpan('full')
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                // Clear the "Other" input immediately when designation is not 'Other'
                                                if ($state !== 'Other') {
                                                    $set('ho2_designation_other', null);
                                                }
                                            }),

                                        TextInput::make('ho2_designation_other')
                                            ->label('Other Designation')
                                            ->reactive()
                                            ->visible(fn ($get) => $get('ho2_designation') === 'Other')
                                            ->required(fn ($get) => $get('ho2_designation') === 'Other')
                                            ->dehydrateStateUsing(fn ($state, $get) => $get('ho2_designation') === 'Other' ? $state : null)
                                            ->columnSpan('full'),

                                        TextInput::make('ho2_contact')->label('Contact Number')->columnSpan('full'),
                                        TextInput::make('ho2_email')->label('Email')->email()->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),
                        ]),

                Grid::make(2) // Outer grid, 2 columns for the 2 fieldsets
                    ->schema([

                        // ================= Compliance Officer 1 =================
                        Fieldset::make('Compliance Officer 1')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('co1_fn')->label('First Name')->columnSpan('full')->required(),
                                        TextInput::make('co1_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('co1_ln')->label('Last Name')->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('co1_designation')->label('Designation')->columnSpan('full')->required(),
                                        TextInput::make('co1_contact')->label('Contact Number')->columnSpan('full')->required(),
                                        TextInput::make('co1_email')->label('Email')->email()->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),

                        // ================= Compliance Officer 2 =================
                        Fieldset::make('Compliance Officer 2')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('co2_fn')->label('First Name')->columnSpan('full'),
                                        TextInput::make('co2_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('co2_ln')->label('Last Name')->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('co2_designation')->label('Designation')->columnSpan('full'),
                                        TextInput::make('co2_contact')->label('Contact Number')->columnSpan('full'),
                                        TextInput::make('co2_email')->label('Email')->email()->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),
                        ]),

                Grid::make(2) // Outer grid, 2 columns for the 2 fieldsets
                    ->schema([

                        // ================= Loan Officer 1 =================
                        Fieldset::make('Loan Officer 1')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('lo1_fn')->label('First Name')->columnSpan('full')->required(),
                                        TextInput::make('lo1_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('lo1_ln')->label('Last Name')->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('lo1_designation')->label('Designation')->columnSpan('full')->required(),
                                        TextInput::make('lo1_contact')->label('Contact Number')->columnSpan('full')->required(),
                                        TextInput::make('lo1_email')->label('Email')->email()->columnSpan('full')->required(),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),

                        // ================= Loan Officer 2 =================
                        Fieldset::make('Loan Officer 2')
                            ->schema([
                                Fieldset::make('Name')
                                    ->schema([
                                        TextInput::make('lo2_fn')->label('First Name')->columnSpan('full'),
                                        TextInput::make('lo2_mn')->label('Middle Name')->columnSpan('full'),
                                        TextInput::make('lo2_ln')->label('Last Name')->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),

                                Fieldset::make('Details')
                                    ->schema([
                                        TextInput::make('lo2_designation')->label('Designation')->columnSpan('full'),
                                        TextInput::make('lo2_contact')->label('Contact Number')->columnSpan('full'),
                                        TextInput::make('lo2_email')->label('Email')->email()->columnSpan('full'),
                                    ])
                                    ->columnSpan(1),
                            ])
                            ->columnSpan(1),
                        ]),

            ])
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        if (($data['ho1_designation'] ?? null) !== 'Other') {
            $data['ho1_designation_other'] = null;
        }

        if (($data['ho2_designation'] ?? null) !== 'Other') {
            $data['ho2_designation_other'] = null;
        }

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
