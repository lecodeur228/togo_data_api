<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlaceResource\Pages;
use App\Filament\Resources\PlaceResource\RelationManagers;
use App\Models\Place;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlaceResource extends Resource
{
    protected static ?string $model = Place::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')->label('Nom du lieu')  ->required(),
                Forms\Components\Select::make('categorie')
                ->options([
                    'Hotel' => 'Hotel',
                    'Resto' => 'Resto',
                    'Pharmacie' => 'Pharmacie',
                ])->label('Type categorie du lieu ')  ->required(),
                Forms\Components\TextInput::make('latitude')->label('Latitude du lieu')  ->required(),
                Forms\Components\TextInput::make('longitude')->label('Longitude du lieu')  ->required(),
                Forms\Components\TextInput::make('phone')->label('Numero de téléphone du lieu'),
               
                FileUpload::make('imageUrl')->label('Image du lieu') ->required(),
                Textarea::make('description')->label('Description du lieu')
                ->autosize()
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imageUrl'),
                TextColumn::make('nom')->searchable(),
                TextColumn::make('categorie'),
                TextColumn::make('phone'),
                TextColumn::make('latitude'),
                TextColumn::make('longitude'),
                TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPlaces::route('/'),
            'create' => Pages\CreatePlace::route('/create'),
            'edit' => Pages\EditPlace::route('/{record}/edit'),
        ];
    }
}
