<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MethodicalWorksResource\Pages;
use App\Models\Groups;
use App\Models\MethodicalWorks;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\CheckboxColumn;

class MethodicalWorksResource extends Resource
{
    protected static ?string $model = MethodicalWorks::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $label = "Методичские работы ";
    protected static ?string $navigationGroup = "Методические работы";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Создание методической работы")->schema([
                        TextInput::make('title')
                            ->autofocus()
                            ->label("Название методической работы")
                            ->helperText('Здесь необходимо написать, какую новую методическую работы вы желаете опубликовать для сайта')
                            ->required(),
                        Checkbox::make('show')
                            ->label("Показывать методическую работу?")
                            ->helperText('Желаете ли вы отображать эту методическую работу и все элементы связанные с ней?')
                            ->default(1),
                        Select::make("groups_ids")
                            ->multiple()
                            ->searchable()
                            ->label("Выберите учебные дисциплины")
                            ->helperText("Выберите из списка какие учебные дисциплины будут доступны по данному направлению")
                            ->options(function(){
                                return Groups::all()->pluck('title', 'id');
                            }),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("Номер методической работы"),
                TextColumn::make('title')->label("Название методической работы"),
                TextColumn::make('groups_ids')->label("Номера специальностей у данной методической работы"),
                CheckboxColumn::make('show')->label("Видимость элемента"),
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
            'index' => Pages\ListMethodicalWorks::route('/'),
            'create' => Pages\CreateMethodicalWorks::route('/create'),
            'edit' => Pages\EditMethodicalWorks::route('/{record}/edit'),
        ];
    }
}
