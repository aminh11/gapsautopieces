<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuctionResource\Pages;
use App\Models\Auction;
use App\Models\Product;
use App\Models\User;
use App\Models\Carbrand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class AuctionResource extends Resource
{
    protected static ?string $model = Auction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Enchères';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations de l\'enchère')
                    ->schema([
                        Select::make('product_id')
                            ->label('Produit')
                            ->options(Product::query()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        // 👉 Association carbrand
                        Select::make('carbrand_id')
                            ->label('Marque de voiture')
                            ->options(Carbrand::query()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        TextInput::make('starting_price')
                            ->label('Prix de départ')
                            ->required()
                            ->numeric()
                            ->prefix('TND'),

                        TextInput::make('current_price')
                            ->label('Prix actuel')
                            ->required()
                            ->numeric()
                            ->prefix('TND'),

                        TextInput::make('reserve_price')
                            ->label('Prix de réserve')
                            ->helperText('Prix minimum pour que l\'enchère soit validée')
                            ->numeric()
                            ->prefix('TND'),

                        TextInput::make('bid_increment')
                            ->label('Incrément d\'enchère')
                            ->helperText('Montant minimum d\'augmentation pour chaque enchère')
                            ->required()
                            ->numeric()
                            ->default(10)
                            ->prefix('TND'),

                        DateTimePicker::make('start_date')
                            ->label('Date de début')
                            ->required(),

                        DateTimePicker::make('end_date')
                            ->label('Date de fin')
                            ->required()
                            ->after('start_date'),

                        Select::make('status')
                            ->label('Statut')
                            ->options([
                                'pending' => 'En attente',
                                'active' => 'Active',
                                'ended' => 'Terminée',
                                'canceled' => 'Annulée',
                            ])
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        Select::make('winner_id')
                            ->label('Gagnant')
                            ->options(User::query()->pluck('name', 'id'))
                            ->searchable()
                            ->nullable(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('product.name')
                    ->label('Produit')
                    ->sortable()
                    ->searchable(),

                // 👉 Affichage carbrand
                TextColumn::make('carbrand.name')
                    ->label('Marque')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('starting_price')
                    ->label('Prix de départ')
                    ->money('TND')
                    ->sortable(),

                TextColumn::make('current_price')
                    ->label('Prix actuel')
                    ->money('TND')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'active' => 'success',
                        'ended' => 'info',
                        'canceled' => 'danger',
                    }),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('start_date')
                    ->label('Date de début')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Date de fin')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('winner.name')
                    ->label('Gagnant')
                    ->placeholder('Pas encore de gagnant')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'active' => 'Active',
                        'ended' => 'Terminée',
                        'canceled' => 'Annulée',
                    ]),

                SelectFilter::make('is_active')
                    ->label('Active')
                    ->options([
                        '1' => 'Oui',
                        '0' => 'Non',
                    ]),

                // 👉 Filtre par Marque de voiture
                SelectFilter::make('carbrand')
                    ->relationship('carbrand', 'name')
                    ->label('Marque de voiture'),
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
            'index' => Pages\ListAuctions::route('/'),
            'create' => Pages\CreateAuction::route('/create'),
            'edit' => Pages\EditAuction::route('/{record}/edit'),
        ];
    }
}
