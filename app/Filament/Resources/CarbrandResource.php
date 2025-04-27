<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarbrandResource\Pages;
use App\Models\Carbrand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;

class CarbrandResource extends Resource
{
    protected static ?string $model = Carbrand::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Marques de voitures';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la marque')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->disabled()
                    ->required()
                    ->dehydrated()
                    ->maxLength(255)
                    ->unique(Carbrand::class, 'slug', ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
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
            'index' => Pages\ListCarbrands::route('/'),
            'create' => Pages\CreateCarbrand::route('/create'),
            'edit' => Pages\EditCarbrand::route('/{record}/edit'),
        ];
    }
}
