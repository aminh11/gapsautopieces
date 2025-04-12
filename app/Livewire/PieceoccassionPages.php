<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Page produits - GAPS')]

class PieceoccassionPages extends Component
{
    use WithPagination;

    public function render() 
    {
        $pieceoocassionQuery = Product::query()->where('is_active', 1);
        return view('livewire.pieceoccassion-pages',[
            'pieceoccassion' => $pieceoocassionQuery->paginate(6),
            'brands' => Brand::where ('is_active', 1)->get(['id', 'name', 'slug']),
            'catalogue' =>Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
