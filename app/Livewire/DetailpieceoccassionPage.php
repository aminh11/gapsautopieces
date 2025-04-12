<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('détails Pieces occassion - GAPS')]

class DetailpieceoccassionPage extends Component
{
     
    public $slug;
    public function mount ($slug) {
        $this->slug =$slug;
    }
    public function render()
    {
        return view('livewire.detailpieceoccassion-page',
        [ 'pieceoccassion' => Product::where('slug', $this->slug)->firstOrFail(),
    ]);
    }
}
