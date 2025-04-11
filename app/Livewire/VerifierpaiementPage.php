<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page verification - GAPS')]

class VerifierpaiementPage extends Component
{
    public function render()
    {
        return view('livewire.verifierpaiement-page');
    }
}
