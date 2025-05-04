<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class CommandeParStatus extends ChartWidget 
{
    protected static ?string $heading = 'Commandes par Status';
    protected function getType(): string
    {
        return 'pie'; 
    }

    protected function getData(): array
    {
        $new = Order::where('status', 'new')->count();
        $processing = Order::where('status', 'processing')->count();
        $shipped = Order::where('status', 'shipped')->count();
        $delivered = Order::where('status', 'delivered')->count();
        $canceled = Order::where('status', 'canceled')->count();

        return [
            'labels' => ['New', 'Processing', 'Shipped', 'Delivered', 'Canceled'],
            'datasets' => [[
                'label' => 'Commandes',
                'data' => [$new, $processing, $shipped, $delivered, $canceled],
                'backgroundColor' => ['#3B82F6', '#F59E0B', '#10B981', '#00ff22', '#EF4444'],
            ]],
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 6;
    }
}

