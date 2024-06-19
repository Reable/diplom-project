<?php

namespace App\Filament\Resources\QualificationsResource\Pages;

use App\Filament\Resources\QualificationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQualifications extends ListRecords
{
    protected static string $resource = QualificationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
