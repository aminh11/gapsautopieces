<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Auction;
use App\Models\Order;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Utilisateurs', User::count())
            ->description('Utilisateurs inscrits dans le sit') 
            ->descriptionIcon('heroicon-m-user-group')
            ->color('success')
            ->icon('heroicon-o-user-group'), 
    
            Stat::make('Enchères Actives', Auction::where('status', 'active')->count())
            ->description('Total des enchères actives')
            ->descriptionIcon('heroicon-m-document-check')
            ->color('success'),    

            Stat::make('Prix moyen', number_format(Order::avg('grand_total'), 0) . ' TND')
                ->description('Basé sur toutes les commandes')
                ->color('gray'),
        ];
    }
    
}
