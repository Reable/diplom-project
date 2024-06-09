<?php

namespace App\Filament\Resources\TheoreticalMaterialsResource\Pages;

use App\Filament\Resources\TheoreticalMaterialsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTheoreticalMaterials extends EditRecord
{
    protected static string $resource = TheoreticalMaterialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
