<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page Encheres - GAPS')]

class EncheresPages extends Component
{
    public function render()
    {
        return view('livewire.encheres-pages');
    }
}
