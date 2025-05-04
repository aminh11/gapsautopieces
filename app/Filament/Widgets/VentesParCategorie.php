<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class VentesParCategorie extends ChartWidget
{
    protected static ?string $heading = 'Ventes par Catégorie';

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {
        $data = Category::with('products.orderItems')
            ->get()
            ->mapWithKeys(function ($category) {
                $totalQuantite = $category->products->flatMap->orderItems->sum('quantity');
                return [$category->name => $totalQuantite];
            });

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [[
                'label' => 'Quantité vendue',
                'data' => $data->values()->toArray(),
                'backgroundColor' => [
                    '#3B82F6', '#10B981', '#F59E0B', '#8B5CF6',
                    '#EC4899', '#F87171', '#0EA5E9', '#A3E635',
                ],
            ]],
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 6;
    }
}

