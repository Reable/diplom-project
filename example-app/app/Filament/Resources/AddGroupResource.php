<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddGroupResource\Pages;
use App\Models\Groups;
use App\Models\TrainingSessions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;

class AddGroupResource extends Resource
{
    protected static ?string $model = Groups::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $label = "Специальности ";
    protected static ?string $navigationGroup = "Учебные материалы";

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
                        Select::make("form_education")
                            ->label("Выберите форму обучения")
                            ->options([
                                1 => "Очная",
                                2 => "Заочная"
                            ])
                            ->required()
                            ->default(1),
                        FileUpload::make('path_url')
                            ->label("Выберите фотографию для специальности")
                            ->directory("groups")
                            ->required(),
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
                
                SelectColumn::make("form_education")
                ->label("Форма обучения")
                ->options([
                    1  =>  "Очная",
                    2   =>  "Заочная",
                ])
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
