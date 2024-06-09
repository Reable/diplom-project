<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddGroupResource\Pages;
use App\Models\Groups;
use App\Models\TrainingSessions;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\TextColumn;

class AddGroupResource extends Resource
{
    protected static ?string $model = Groups::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $label = "Специальности ";
    protected static ?string $navigationGroup = "Методические работы";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Добавление специальности")->schema([
                        TextInput::make('code')
                            ->autofocus()
                            ->label("Введите код направления обучения")
                            ->helperText('Здесь необходимо написать, код группы к примеру 09.02.07')
                            ->required(),
                        TextInput::make('title')
                            ->autofocus()
                            ->label("Введите название направления обучения")
                            ->helperText('Здесь необходимо написать профессию или специальность')
                            ->required(),
                        Select::make("training_session_ids")
                            ->multiple()
                            ->searchable()
                            ->label("Выберите учебные дисциплины")
                            ->helperText("Выберите из списка какие учебные дисциплины будут доступны по данному направлению")
                            ->options(function(){
                                return TrainingSessions::all()->pluck('title', 'id');
                            }),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id")->label("Номер специальности"),
                TextColumn::make("code")->label("Код направления"),
                TextColumn::make("title")->label("Названия направления"),
                TextColumn::make("training_session_ids")->label("Номера учебных дисциплин"),
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
            'index' => Pages\ListAddGroups::route('/'),
            'create' => Pages\CreateAddGroup::route('/create'),
            'edit' => Pages\EditAddGroup::route('/{record}/edit'),
        ];
    }
}
