<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Auction;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Page Accueil - GAPS')]
class HomePage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active', 1)->take(4)->get();

        // Afficher seulement 8 catégories
        $pieceoccassion = Category::where('is_active', 1)->take(8)->get();

        // Récupérer les enchères actives, qui ne sont pas encore terminées
        $auctionProducts = Auction::where('is_active', true)
            ->where('status', 'active')
            ->where('end_date', '>', now())
            ->orderBy('end_date', 'asc')
            ->take(8)
            ->get();

        return view('livewire.home-page', [
            'brands' => $brands,
            'pieceoccassion' => $pieceoccassion,
            'auctionProducts' => $auctionProducts,
        ]);
    }
}
