<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Order;
use App\Models\Product;
use BcMath\Number;
use Dom\Text;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('user_id')
                            ->label('Customer')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('payment_method')
                            ->options([
                                'D17' => 'D17',
                                'cash_on_delivery' => 'Cash on Delivery',])
                            ->required(),

                        Select::make('payment_status')
                                ->options([
                                    'pending' => 'Pending',
                                    'paid' => 'Paid',
                                    'failed' => 'Failed',])
                                    ->default('pending')
                                    ->required(),

                        ToggleButtons::make('status')
                                    ->inline()
                                    ->default('new')
                                    ->required()
                                    ->options([
                                        'new' => 'New',
                                        'processing' => 'Processing',
                                        'shipped' => 'Shipped',
                                        'delivered' => 'Delivered',
                                        'canceled' => 'Canceled', ]) 
                                    ->colors([
                                        'new' => 'info',
                                        'processing' => 'warning',
                                        'shipped' => 'success',
                                        'delivered' => 'success',
                                        'canceled' => 'danger', ])
                                    ->icons([
                                        'new' => 'heroicon-m-sparkles',
                                        'processing' => 'heroicon-m-arrow-path',
                                        'shipped' => 'heroicon-m-truck',
                                        'delivered' => 'heroicon-m-check-badge',
                                        'canceled' => 'heroicon-m-x-circle', ]),
                                    Select::make('currency')
                                         ->options([
                                            'TND' => 'TND',])
                                            ->default('TND')
                                            ->required(),
                                    Select::make('shipping_method')
                                            ->options([
                                                'aramex' => 'Aramex',
                                                'First delivery' => 'First Delivery'])
                                                ->required(),
                                    Textarea::make('notes')
                                            ->columnSpanFull()
                         ])->columns(2),

                    Section::make('Order Items')->schema([
                        Repeater::make('items')
                        ->relationship()
                        ->schema([
                            Select::make('product_id')
                                ->relationship('product', 'name')
                                ->searchable()
                                ->preload()
                                ->distinct()
                                ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                ->columnSpan(4)
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(fn($state, Set $set) => $set('unit_amount', Product::find($state)
                                ?->price ?? 0))
                                ->afterStateUpdated(fn($state, Set $set) => $set('total_amount', Product::find($state)
                                ?->price ?? 0)),

                            TextInput::make('quantity')
                                ->type('number')
                                ->default(1)
                                ->required()
                                ->minValue(1)
                                ->columnSpan(2)
                                ->reactive()
                                ->afterStateUpdated(fn ($state, Set $set, Get $get) =>
                                $set('total_amount', (float) $get('unit_amount') * (int) $get('quantity'))
                            ),
                            TextInput::make('unit_amount')
                                ->type('number')
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->columnSpan(3),

                            TextInput::make('total_amount')
                                ->type('number')
                                ->required()
                                ->dehydrated()
                                ->columnSpan(3),

                        ])->columns(12),
                    Placeholder::make('grand_total_holder')
                    ->label('Grand Total')
                    ->content(function(Get $get, Set $set){
                        $total = 0;
                        if (!$repeaters = $get('items')) {
                            return $total;
                        }
                        foreach ($repeaters as $key => $repeater) {
                            $total += $get("items.{$key}.total_amount");
                        }
                        $set('grand_total', $total);
                  //Exemple : 2000 devient 2 000 TND      
                        return number_format($total, 0, ',', ' ') . ' TND';
                    }),
                    Hidden::make('grand_total')
                    ->default(0)
                    ])
                ])->columnSpanFull() 
            ]);          
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('TND'),

                TextColumn::make('payment_method')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('payment_status')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('currency')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('shipping_method')
                    ->sortable()
                    ->searchable(),

                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'canceled' => 'Canceled', ])
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),                    
            ])
            ->filters([
                // 
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
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
            AddressRelationManager::class
        ];
    }
    //fonction pour afficher le nombre de commandes dans la barre de navigation
    public static function getNavigationBadge(): ?string 
    {
        return static::getModel()::count();
    }
    //fonction pour changer la couleur du badge en fonction du nombre de commandes
    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 15 ? 'success' : 'danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
