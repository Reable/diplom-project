<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoGalleryResource\Pages;
use App\Models\PhotoGallery;
use App\Models\Albums;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PhotoGalleryResource extends Resource
{
    protected static ?string $model = PhotoGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $label = "Фотографии ";
    protected static ?string $navigationGroup = "Фотогалерея";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Добавление фотографии к альбому")->schema([
                        TextInput::make('title')
                            ->label("Добавьте название для фотографии (необязательно)")
                            ->helperText('Здесь необходимо написать название для фотографии, добавьте название если желаете в дальнейшем использовать его на других страницах'),
                        Select::make("album_id")
                            ->label("Выберите альбом")
                            ->required()
                            ->searchable()
                            ->options(function(){
                                return Albums::all()->pluck("title", "id");
                            }),
                        FileUpload::make("path_url")
                            ->label("Выберите один файл для загрузки в альбом")
                            ->directory("albums")
                            ->image()
                            ->required()
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("Номер фотографии"),
                TextColumn::make('title')->label("Название фотографии"),
                ImageColumn::make('path_url')->label("Изображение")
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
            'index' => Pages\ListPhotoGalleries::route('/'),
            'create' => Pages\CreatePhotoGallery::route('/create'),
            'edit' => Pages\EditPhotoGallery::route('/{record}/edit'),
        ];
    }
}
