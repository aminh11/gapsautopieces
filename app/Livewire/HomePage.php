<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Page Acceuil - GAPS')]
class HomePage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active', 1)->take(4)->get();

        // Afficher seulement 8 catégories
        $pieceoccassion = Category::where('is_active', 1)->take(8)->get();

        return view('livewire.home-page', [
            'brands' => $brands,
            'pieceoccassion' => $pieceoccassion,
        ]);
    }
}
