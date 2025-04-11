<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page pieces - GAPS')]

class PieceoccassionPages extends Component
{
    public function render()
    {
        return view('livewire.pieceoccassion-pages');
    }
}
