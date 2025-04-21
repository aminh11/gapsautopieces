<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Auction;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Page Acceuil - GAPS')]
class HomePage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active', 1)->take(4)->get();

        // seulement 8 catégories
        $pieceoccassion = Category::where('is_active', 1)->take(8)->get();
        //h
        $auctions = Auction::where('is_active', 1)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();


        return view('livewire.home-page', [
            'brands' => $brands,
            'pieceoccassion' => $pieceoccassion,
            'auctions' => $auctions,
        ]);
    }
}
