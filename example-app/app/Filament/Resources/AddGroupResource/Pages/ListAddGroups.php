<?php

namespace App\Filament\Resources\AddGroupResource\Pages;

use App\Filament\Resources\AddGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAddGroups extends ListRecords
{
    protected static string $resource = AddGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
