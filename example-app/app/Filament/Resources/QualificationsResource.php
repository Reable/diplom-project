<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QualificationsResource\Pages;
use App\Filament\Resources\QualificationsResource\RelationManagers;
use App\Models\Qualifications;
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

class QualificationsResource extends Resource
{
    protected static ?string $model = Qualifications::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = "Квалификации ";
    protected static ?string $navigationGroup = "Личная информация";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()->tabs([
                    Tabs\Tab::make("Создание квалификации")->schema([
                        TextInput::make('order')
                            ->default(function(){
                                $order = Qualifications::orderBy('order', "desc")->first();
                                return isset($order) ? $order->order + 1 : 1 ;
                            })
                            ->autofocus()
                            ->label("Порядковый номер")
                            ->helperText('Порядковый номер добавляется автоматически')
                            ->required(),
                        Select::make('type')
                            ->searchable()
                            ->label("Выберите тип сертификата")
                            ->helperText('Здесь необходимо выбрать тип сертификата, если вы выбераете сертификат, не забудьте дабавить дату окончания')
                            ->options([
                                1 => "Удостоверение о повышении квалификации",
                                2 => "Сертификат об окончании курса от "
                            ])
                            ->required(),
                        TextInput::make('year')
                            ->default(function(){
                                $year = date("Y");
                                return $year;
                            })
                            ->label("Введите год")
                            ->helperText('Здесь необходимо написать год прохождения квалификации')
                            ->required(),
                        TextInput::make("number_document")
                            ->label("Введите номер документа")
                            ->helperText('Здесь необходимо написать номер документа')
                            ->required(),
                        TextInput::make("title")
                            ->label("Введите тему квалификации")
                            ->helperText('Здесь необходимо написать тему квалификации')
                            ->required(),
                        TextInput::make("hours_date")
                            ->label("Введите дату окончания (необязательно)")
                            ->helperText('Здесь необходимо написать дату получения удостоверения о прохождении квалификации'),
                        FileUpload::make('path_url')
                            ->label("Выберите файл для загрузки на сервер")
                            ->directory("qualifications")
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
                TextColumn::make("number_document")->label("Номер документа"),
                TextColumn::make("title")->label("Навзание квалификации")
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
            'index' => Pages\ListQualifications::route('/'),
            'create' => Pages\CreateQualifications::route('/create'),
            'edit' => Pages\EditQualifications::route('/{record}/edit'),
        ];
    }
}
