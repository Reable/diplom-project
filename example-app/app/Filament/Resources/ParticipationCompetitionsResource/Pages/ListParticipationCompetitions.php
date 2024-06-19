<?php

namespace App\Filament\Resources\ParticipationCompetitionsResource\Pages;

use App\Filament\Resources\ParticipationCompetitionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParticipationCompetitions extends ListRecords
{
    protected static string $resource = ParticipationCompetitionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
