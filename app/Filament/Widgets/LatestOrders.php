<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables\Actions\Action;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected int | string| array $columnSpan = 'full';
    //afficher widgets de (OrderStats) en haut
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            //afficherai 5 enregistrements par par defaut dans une seule page
            ->defaultPaginationPageOption(5)
            //adaptera aux commandes à partir de la plus récente
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                ->label('Order ID')
                ->searchable(),

                TextColumn::make('user.name')
                ->searchable(),

                TextColumn::make('grand_total')
                ->money('TND'),

                /// Affiche la colonne 'status' sous forme de badge coloré selon la valeur (par exemple: processing, new)
                TextColumn::make('status')
                ->badge()
                ->color(fn(string $state):string => match($state) {
                    'processing' => 'warning',
                    'new' => 'info',
                    'shipped' => 'success',
                    'delivered' => 'success',
                    'canceled' => 'danger',
                })
                ->icon(fn(string $state):string => match($state) {
                    'processing' => 'heroicon-m-arrow-path',
                    'shipped' => 'heroicon-m-truck',
                    'new' => 'heroicon-m-sparkles',
                    'delivered' => 'heroicon-m-check-badge',
                    'canceled' => 'heroicon-m-x-circle',
                })
                //trié par ordre alphabétique
                ->sortable(),

                TextColumn::make('payment_method')
                ->sortable()
                ->searchable(),

                TextColumn::make('payment_status')
                ->sortable()
                ->badge()
                ->searchable(),

                TextColumn::make('created_at')
                ->label('Order Date')
                ->dateTime(),
            ])
            //boutton d'action pour voir les détails de la commande
            ->actions([
                Action::make('View Order')
                ->url(fn(Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                ->icon('heroicon-o-eye')
            ]);
    }
}
