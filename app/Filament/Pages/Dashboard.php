<?php

namespace App\Filament\Pages;

use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\CommandeParStatus;
use App\Filament\Widgets\VentesParCategorie;
use App\Filament\Widgets\CommandesParRegion;
use App\Filament\Widgets\VenteMensuelles;
use App\Filament\Widgets\LatestOrders;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            OrderStats::class,
            CommandeParStatus::class,
            VenteMensuelles::class,
            VentesParCategorie::class,
            CommandesParRegion::class,
            LatestOrders::class,
            
        ];
    }
    public function getColumns(): int
{
    return 20;
}
}
