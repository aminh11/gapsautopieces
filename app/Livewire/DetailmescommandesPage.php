<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Detail commandes - GAPS')]

class DetailmescommandesPage extends Component
{
    public $order_id;
    //Initialiser l'id de commande propriété publique
    public function mount($order_id)
    {
        $this->order_id = $order_id;

    }
    public function render()
    {
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $address = Address::where('order_id', $this ->order_id)->first();
        $order = Order::where('id', $this->order_id)->first();
        return view('livewire.detailmescommandes-page', [
            'order_items' => $order_items, 
            'address' => $address,
            'order' => $order
        ]);
    }
}
