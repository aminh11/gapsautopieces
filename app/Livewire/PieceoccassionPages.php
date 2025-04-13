<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Page produits - GAPS')]

class PieceoccassionPages extends Component
{
    use WithPagination;
    
    #[Url]
    public $selected_catalogue = [];

    #[Url]
    public $selected_brands = [];

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;
    #[Url]
    public $price_range = 50;




    public function render() 
    {
        $pieceoccassionQuery = Product::query()->where('is_active', 1);

        if(!empty($this->selected_catalogue)){
            $pieceoccassionQuery->whereIn('category_id', $this->selected_catalogue);
        }

        if(!empty($this->selected_brands)){
            $pieceoccassionQuery->whereIn('brand_id', $this->selected_brands);
        }

        if($this->featured){
            $pieceoccassionQuery->where('is_featured', 1);
        }

        if($this->on_sale){
            $pieceoccassionQuery->where('on_sale', 1);
        }
        
        if($this->price_range){
            $pieceoccassionQuery->whereBetween('price', ['0', $this->price_range]);
        }

        return view('livewire.pieceoccassion-pages',[
            'pieceoccassion' => $pieceoccassionQuery->paginate(9),
            'brands' => Brand::where ('is_active', 1)->get(['id', 'name', 'slug']),
            'catalogue' =>Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
