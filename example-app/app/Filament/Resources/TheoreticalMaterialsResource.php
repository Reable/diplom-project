<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TheoreticalMaterialsResource\Pages;
use App\Models\Groups;
use App\Models\TheoreticalMaterials;
use App\Models\TrainingSessions;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class TheoreticalMaterialsResource extends Resource
{
    protected static ?string $model = TheoreticalMaterials::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $label = "Теоритические материалы ";
    protected static ?string $navigationGroup = "Методические работы";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Добавление конспекта")->schema([
                        Select::make('group_id')
                            ->searchable()
                            ->label("Выберите специальность")
                            ->helperText('Здесь необходимо выбрать специальность которой будет добавлен конспект')
                            ->options(function(){
                                return Groups::all()->pluck('title', 'id');
                            })
                            ->required(),
                        Select::make('training_session_id')
                            ->searchable()
                            ->label("Выберите учебную дисциплину")
                            ->helperText('Здесь необходимо выбрать дисциплину в которую будет добавлен новый конспект')
                            ->options(function(){
                                return TrainingSessions::all()->pluck('title', 'id');
                            })
                            ->required(),
                        TextInput::make('title')
                            ->label("Добавьте название для материала")
                            ->helperText('Здесь необходимо написать название для теоритического материала')
                            ->required(),
                        FileUpload::make('path_url')
                            ->label("Выберите конспект для загрузки")
                            ->directory("theoretical_materials")
                            ->required(),

                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("Номер уч. материала"),
                TextColumn::make('group_id')->label("Номер специальности"),
                TextColumn::make('training_session_id')->label("Номер дисциплины"),
                TextColumn::make('title')->label("Название конспекта"),
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
            'index' => Pages\ListTheoreticalMaterials::route('/'),
            'create' => Pages\CreateTheoreticalMaterials::route('/create'),
            'edit' => Pages\EditTheoreticalMaterials::route('/{record}/edit'),
        ];
    }
}
