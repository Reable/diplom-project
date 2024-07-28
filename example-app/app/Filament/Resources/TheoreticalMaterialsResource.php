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
    protected static ?string $label = "Теоретические материалы ";
    protected static ?string $navigationGroup = "Учебные материалы";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Добавление теоритического материала")->schema([
                        Select::make('training_session_id')
                            ->searchable()
                            ->label("Выберите учебную дисциплину")
                            ->helperText('Здесь необходимо выбрать дисциплину в которую будет добавлен новый конспект')
                            ->options(function(){
                                $sessions = TrainingSessions::all();
                                $data = [];
                                foreach($sessions as $session){
                                    $group =  Groups::find($session["group_id"]);
                                    $form_education = $group["form_education"] == 1 ? "Очная" : "Заочная";
                                    $key = $session["title"]." - " . $session["group_title"] . " - " . $form_education;
                                    $data[$session["id"]] = $key;
                                }
                                return $data;
                            })
                            ->required(),
                        TextInput::make('title')
                            ->label("Добавьте название для теоритического материала")
                            ->helperText('Здесь необходимо написать название для теоритического материала')
                            ->required(),
                        FileUpload::make('path_url')
                            ->label("Выберите файл для загрузки")
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
                TextColumn::make('id')->label("Номер учебного материала"),
                TextColumn::make('training_session_id')->label("Номер дисциплины"),
                TextColumn::make('title')->label("Название теоритического материала"),
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
