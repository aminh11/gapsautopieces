<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page Panier - GAPS')]

class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;
// Chercher tous les éléements du panier qui sont stockés dans le cookie
    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
    }

    public function removeItem($pieceoccassion_id)
    {
        $this ->cart_items = CartManagement::removeCartItem($pieceoccassion_id);
        $this->grand_total = CartManagement::calculateGrandTotal($this->cart_items);
        //mise à jour du nombre d'articles dans le panier de nav bar 
        $this->dispatch('update-cart-count', total_count: count($this->cart_items));
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
