<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingSessionsResource\Pages;
use App\Models\Groups;
use App\Models\TrainingSessions;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;

class TrainingSessionsResource extends Resource
{
    protected static ?string $model = TrainingSessions::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $label = "Учебные дисциплины ";
    protected static ?string $navigationGroup = "Учебные материалы";

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

                        Select::make('group_title')
                            ->searchable()
                            ->label("Выберите специальность")
                            ->helperText('Здесь необходимо выбрать специальность к которой вы хотите довить дисциплину')
                            ->options(function(){
                                $groups = Groups::all();
                                $data = [];
                                foreach($groups as $group){
                                    if($group["form_education"] === 1){
                                        $key = $group["title"]." - Очная";
                                        $data[$group["title"]] = $key;
                                    } else {
                                        $key = $group["title"]." - Заочная";
                                        $data[$group["title"]] = $key;
                                    }
                                }
                                return $data;
                            })
                            ->required(),
                        Select::make('group_id')
                            ->searchable()
                            ->label("Выберите специальность")
                            ->helperText('Здесь необходимо выбрать специальность к которой вы хотите довить дисциплину')
                            ->options(function(){
                                $groups = Groups::all();
                                $data = [];
                                foreach($groups as $group){
                                    if($group["form_education"] === 1){
                                        $key = $group["title"]." - Очная";
                                        $data[$group["id"]] = $key;
                                    } else {
                                        $key = $group["title"]." - Заочная";
                                        $data[$group["id"]] = $key;
                                    }
                                }
                                return $data;
                            })
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
                TextColumn::make("title")->label("Название предмета"),
                TextColumn::make("group_title")->label("Для какой специальности данная дисциплина")
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
