<?php

namespace App\Filament\Resources\RegistrantResource\Pages;

use App\Filament\Resources\RegistrantResource;
use Filament\Resources\Pages\ViewRecord;

class ViewRegistrant extends ViewRecord
{
    protected static string $resource = RegistrantResource::class;
    protected static string $view = 'filament.admin.resources.registrant-resource.pages.view-registrant';
}