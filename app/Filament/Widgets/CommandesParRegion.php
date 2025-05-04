<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class CommandesParRegion extends ChartWidget
{
    protected static ?string $heading = 'Commandes par Région';
    protected static ?string $maxHeight = '300px';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $data = Order::join('addresses', 'orders.id', '=', 'addresses.order_id')
            ->selectRaw('addresses.city as region, COUNT(orders.id) as total')
            ->groupBy('addresses.city')
            ->pluck('total', 'region');

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [[
                'label' => 'Nombre de commandes',
                'data' => $data->values()->toArray(),
                'backgroundColor' => '#3B82F6',
                'borderColor' => '#F59E0B',
                'borderWidth' => 1,
                
            ]],
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'ticks' => [
                            'stepSize' => 50,
                            'precision' => 0,
                        ],
                    ],
                ],
            ],
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }
}
