<?php

namespace App\Filament\Resources\PracticalMaterialsResource\Pages;

use App\Filament\Resources\PracticalMaterialsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPracticalMaterials extends ListRecords
{
    protected static string $resource = PracticalMaterialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
