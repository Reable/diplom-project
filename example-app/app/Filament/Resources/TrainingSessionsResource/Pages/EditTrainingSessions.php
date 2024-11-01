<?php

namespace App\Filament\Resources\TrainingSessionsResource\Pages;

use App\Filament\Resources\TrainingSessionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainingSessions extends EditRecord
{
    protected static string $resource = TrainingSessionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
