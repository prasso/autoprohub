<?php

namespace Prasso\AutoProHub\Filament\Resources\CustomerResource\Pages;

use Prasso\AutoProHub\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
