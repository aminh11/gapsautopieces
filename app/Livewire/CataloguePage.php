<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page Catalogue - GAPS')]

class CataloguePage extends Component
{
    public function render()
    {
        return view('livewire.catalogue-page');
    }
}
