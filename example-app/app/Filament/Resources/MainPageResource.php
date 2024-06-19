<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainPageResource\Pages;
use App\Models\Certificates;
use App\Models\Groups;
use App\Models\MainPage;
use App\Models\MethodicalWorks;
use App\Models\PhotoGallery;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class MainPageResource extends Resource
{
    protected static ?string $model = MainPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns';
    protected static ?string $label = "Главная страница ";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Добавление конспекта")->schema([
                        Select::make('groups_ids')
                            ->multiple()
                            ->searchable()
                            ->label("Учебные материалы")
                            ->helperText('Выберите группы для главной страницы')
                            ->options(function(){
                                return Groups::all()->pluck('title', 'id');
                            }),
                        Select::make('photo_gallery_paths')
                            ->multiple()
                            ->searchable()
                            ->label("Фотографии из галереи")
                            ->helperText('Выберите несколько фотографий из галереи для главной страницы')
                            ->options(function(){
                                return PhotoGallery::all()->pluck('title', 'path_url');
                            }),
                        Select::make('certificates_ids')
                            ->multiple()
                            ->searchable()
                            ->label("Сертификаты")
                            ->helperText('Выберите несколько сертификатов для главной страницы')
                            ->options(function(){
                                return Certificates::all()->pluck('title', 'id');
                            }),

                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('groups_ids')->label("Номера учебных материалов"),
                TextColumn::make('certificates_ids')->label("Номера сертификатов"),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("Редактировать страницу")->icon('heroicon-o-pencil'),
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
            'index' => Pages\ListMainPages::route('/'),
            'create' => Pages\CreateMainPage::route('/create'),
            'edit' => Pages\EditMainPage::route('/{record}/edit'),
        ];
    }
}
