<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('PMes commandes - GAPS')]

class MescommandesPages extends Component
{
    public function render()
    {
        return view('livewire.mescommandes-pages');
    }
}
