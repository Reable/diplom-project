<?php

namespace App\Filament\Resources\QualificationsResource\Pages;

use App\Filament\Resources\QualificationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQualifications extends EditRecord
{
    protected static string $resource = QualificationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
