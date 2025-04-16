<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('détails Pieces occassion - GAPS')]

class DetailpieceoccassionPage extends Component
{  
    public $slug;
    public $quantity = 1;

    public function mount ($slug) {
        $this->slug =$slug;
    }
    public function increaseQty(){
        $this->quantity++;
    }
    public function decreaseQty(){
      //si la quantité est supérieure à 1, alors on peut diminuer la quantité  
        if($this->quantity > 1){
            $this->quantity--;
        }
    }
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
        return view('livewire.detailpieceoccassion-page',
        [ 'pieceoccassion' => Product::where('slug', $this->slug)->firstOrFail(),
    ]);
    }
}
