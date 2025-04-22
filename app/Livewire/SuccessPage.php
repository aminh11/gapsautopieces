<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page succès - GAPS')]

class SuccessPage extends Component
{
    public function render()
    {
        //requete nous obtiendrons la dernière commande créée pour utlisateur actuellment conncté
        $latest_order = Order::with('address')->where('user_id', auth()->user()->id)->latest()->first();

        return view('livewire.success-page', [
            'order'=> $latest_order,
        ]);
    }
}
