<?php

namespace App\Filament\Resources\UserRessourceResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Dom\Text;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
        // Affiche la colonne 'id' avec le label personnalisé 'Order ID' et permet la recherche
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('id')
                ->label('Order ID')
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
                ->dateTime()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
//creation une action personalisé qui redirige vers la page de visualisation de la commande sélectionnée (orders)
                Action::make('view Order')
                ->url(fn(Order $record):string => OrderResource::getUrl('view',['record' => $record]))
                ->color('info')
                ->icon('heroicon-o-eye'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
