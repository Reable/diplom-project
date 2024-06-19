<?php

namespace App\Filament\Resources\PracticalMaterialsResource\Pages;

use App\Filament\Resources\PracticalMaterialsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPracticalMaterials extends EditRecord
{
    protected static string $resource = PracticalMaterialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
