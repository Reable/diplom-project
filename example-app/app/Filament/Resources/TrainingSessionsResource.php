<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingSessionsResource\Pages;
use App\Models\TrainingSessions;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Table;


class TrainingSessionsResource extends Resource
{
    protected static ?string $model = TrainingSessions::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $label = "Учебные дисциплины ";
    protected static ?string $navigationGroup = "Методические работы";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make("")->tabs([
                    Tabs\Tab::make("")->schema([
                        TextInput::make('title')
                            ->autofocus()
                            ->label("Название предмета")
                            ->helperText('Здесь напишите какой предмет (пару) вы хотите добавить в базу данных')
                            ->required(),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id")->label("Номер дисциплины"),
                TextColumn::make("title")->label("Название предмета")
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("Редактировать")->icon('heroicon-o-pencil'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainingSessions::route('/'),
            'create' => Pages\CreateTrainingSessions::route('/create'),
            'edit' => Pages\EditTrainingSessions::route('/{record}/edit'),
        ];
    }
}
