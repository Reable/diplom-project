<?php

namespace App\Filament\Resources\AddGroupResource\Pages;

use App\Filament\Resources\AddGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAddGroup extends EditRecord
{
    protected static string $resource = AddGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
