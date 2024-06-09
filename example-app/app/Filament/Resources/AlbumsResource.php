<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumsResource\Pages;
use App\Models\Albums;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\CheckboxColumn;

class AlbumsResource extends Resource
{
    protected static ?string $model = Albums::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $label = "Создание альбома ";
    protected static ?string $navigationGroup = "Фотогалерея";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Создание альбома")->schema([
                        TextInput::make('title')
                            ->autofocus()
                            ->label("Название альбома")
                            ->helperText('Здесь необходимо написать, какое вы хотите дать название для данного альбома')
                            ->required(),
                        Textarea::make('description')
                            ->autofocus()
                            ->label("Описание для альбома")
                            ->helperText('Здесь вы можете написать описание для данного альбома')
                            ->default(""),
                        Checkbox::make('show')
                            ->label("Показывать альбом?")
                            ->helperText('Желаете ли вы отображать этот альбом?')
                            ->default(1),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label("Название альбома"),
                TextColumn::make('description')->label("Описание альбома"),
                CheckboxColumn::make('show')->label("Видимость альбома"),
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
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbums::route('/create'),
            'edit' => Pages\EditAlbums::route('/{record}/edit'),
        ];
    }
}
