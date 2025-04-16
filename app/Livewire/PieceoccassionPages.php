<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
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
    public $price_range = 0;

    public $sort ='latest';

    //methode ajouter produits (pieces d'occasion) au panier
    //livewire alert pour afficher un message de succès

    public function addToCart($pieceoccassion_id)
    {
        $total_count = CartManagement::addItemToCart($pieceoccassion_id);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        LivewireAlert::title('Ajouté...')->success()
        ->text('Le produit a été ajouté au panier avec succès !')
        ->position('bottom-end')
        ->timer(3000)
        ->toast()
        ->show();
    }

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

        if($this->sort == 'latest'){
            $pieceoccassionQuery->latest();
        }
        
        if ($this->sort == 'price') {
            $pieceoccassionQuery->orderBy('price');
        }


        return view('livewire.pieceoccassion-pages',[
            'pieceoccassion' => $pieceoccassionQuery->paginate(9),
            'brands' => Brand::where ('is_active', 1)->get(['id', 'name', 'slug']),
            'catalogue' =>Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
