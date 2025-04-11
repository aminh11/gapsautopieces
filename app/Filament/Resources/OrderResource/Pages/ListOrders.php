<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
//fonction getHeaderWidgets() qui retourne un tableau de widgets
    protected function getHeaderWidgets(): array
    {
        return[
            OrderStats::class
        ];
    }
    //fonction getTabs() qui retourne un tableau de tabs
    public function  getTabs(): array
    {
        return[
            null=> Tab::make('All'),
            'new'=> Tab::make()->query(fn($query) => $query->where('status', 'new')),
            'Canceled'=> Tab::make()->query(fn($query) => $query->where('status', 'Canceled')),
            'processing'=> Tab::make()->query(fn($query) => $query->where('status', 'Processing')),
            'shipped'=> Tab::make()->query(fn($query) => $query->where('status', 'Shipped')),
            'delivered'=> Tab::make()->query(fn($query) => $query->where('status', 'Delivered')),

        ];
    }
}
