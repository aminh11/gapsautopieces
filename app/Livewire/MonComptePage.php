<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class MonComptePage extends Component
{
    public $tab = 'profil';
    public $name;
    public $email;
    public $commandes = [];

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->loadCommandes();
    }

    public function switchTab($value)
    {
        $this->tab = $value;

        if ($value === 'commandes') {
            $this->loadCommandes();
        }
    }

    public function loadCommandes()
    {
        $this->commandes = Order::where('user_id', Auth::id())->with('items')->latest()->get();
    }

    public function updateProfil()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Profil mis à jour.');
    }

    public function render()
    {
        return view('livewire.mon-compte-page');
    }
}
