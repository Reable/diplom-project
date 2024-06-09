<?php

namespace App\Filament\Resources\MethodicalWorksResource\Pages;

use App\Filament\Resources\MethodicalWorksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMethodicalWorks extends ListRecords
{
    protected static string $resource = MethodicalWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
