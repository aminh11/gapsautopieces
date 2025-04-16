<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $total_count = 0;
//method mount() pour initialiser le total_count
//on utilise la méthode count() pour compter le nombre d'articles dans le panier
 //on utilise la méthode getCartItemsFromCookie() pour récupérer les articles du panier à partir du cookie
    public function mount()
    {
        $this->total_count = count(CartManagement::getCartItemsFromCookie());
    }
//nous devons utiliser un attribut #[On] pour écouter l'événement 'update-cart-count' et mettre à jour le total_count
    #[On('update-cart-count')]
//method updateCartCount() pour mettre à jour le total_count
    public function updateCartCount($total_count)
    {
        $this->total_count = $total_count;
    }
    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
