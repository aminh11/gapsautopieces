<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class VenteMensuelles extends ChartWidget
{
    protected static ?string $heading = 'Ventes Mensuelles des Pièces (en quantité)';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $quantiteParMois = collect(range(1, 12))->map(function ($month) {
            return DB::table('order_items')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year)
                ->sum('quantity');
        });

        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                         'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [[
                'label' => 'Nombre de pièces vendues',
                'data' => $quantiteParMois->toArray(),
                'fill' => true,
                'borderColor' => '#0318ff',
                'backgroundColor' => 'rgba(7, 44, 255, 0.2)',
                'tension' => 0.9,
            ]],
            'options' => [
                'scales' => [
                    'y' => [
                        'ticks' => [
                            'stepSize' => 1,
                            'precision' => 0,
                        ],
                    ],
                ],
            ],
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 8;
    }
}

