<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


#[Title('Mes Commandes - GAPS')]

class MescommandesPages extends Component{
    use WithPagination;

    public function render()
    {
        $my_orders = Order::where('user_id', auth()->id())->latest()->paginate(5);
        return view('livewire.mescommandes-pages', [
            'Commandes' => $my_orders,
        ]);
    }
}
