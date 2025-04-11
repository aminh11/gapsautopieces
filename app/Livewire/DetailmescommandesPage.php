<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Detail commandes - GAPS')]

class DetailmescommandesPage extends Component
{
    public function render()
    {
        return view('livewire.detailmescommandes-page');
    }
}
