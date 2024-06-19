<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipationCompetitionsResource\Pages;
use App\Filament\Resources\ParticipationCompetitionsResource\RelationManagers;
use App\Models\Albums;
use App\Models\ParticipationCompetitions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Illuminate\Support\Facades\Date;

class ParticipationCompetitionsResource extends Resource
{
    protected static ?string $model = ParticipationCompetitions::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = "Конкурсы ";
    protected static ?string $navigationGroup = "Личная информация";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Создание конкурса")->schema([
                        TextInput::make('order')
                            ->default(function(){
                                $order = ParticipationCompetitions::orderBy('order', "desc")->first();
                                return isset($order) ? $order->order + 1 : 1 ;
                            })
                            ->autofocus()
                            ->label("Порядковый номер")
                            ->helperText('Порядковый номер добавляется автоматически')
                            ->required(),
                        TextInput::make('year')
                            ->default(function(){
                                $year = date("Y");
                                return $year;
                            })
                            ->label("Введите год")
                            ->helperText('Здесь необходимо написать год участия в конкурсе')
                            ->required(),
                        TextInput::make("title")
                            ->label("Введите название конкурса")
                            ->helperText('Здесь необходимо написать название конкурса')
                            ->required(),
                        TextInput::make("competition")
                            ->label("Введите навзание компетенции")
                            ->helperText('Здесь необходимо написать название компетенции по которой вы участвовали')
                            ->required(),
                        TextInput::make("position")
                            ->label("Напишите вашу должность в конкурсе")
                            ->default("Эксперт")
                            ->helperText('Здесь необходимо написать вашу должность (Эксперт)')
                            ->required(),
                        TextInput::make("place_title")
                            ->label("Напишите награду")
                            ->helperText('Здесь необходимо написать ваше полученную награду ( Диплом: 1-е место) или (Сертификат)')
                            ->required(),
                        Select::make('album_id')
                            ->searchable()
                            ->label("Выберите альбом")
                            ->helperText('Здесь необходимо выбрать альбом для перехода')
                            ->options(function(){
                                return Albums::all()->pluck('title', 'id');
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
                TextColumn::make("order")->label("Порядковый номер"),
                TextColumn::make("year")->label("Год прохождения"),
                TextColumn::make("title")->label("Навзание квалификации"),
                TextColumn::make("place_title")->label("Навзание награды"),
                TextColumn::make("album_id")->label("Номер альбома")
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
            'index' => Pages\ListParticipationCompetitions::route('/'),
            'create' => Pages\CreateParticipationCompetitions::route('/create'),
            'edit' => Pages\EditParticipationCompetitions::route('/{record}/edit'),
        ];
    }
}
