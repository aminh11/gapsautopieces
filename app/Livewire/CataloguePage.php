<?php

namespace App\Livewire;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page Catalogue - GAPS')]

class CataloguePage extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', 1)->get();
        
        return view('livewire.catalogue-page', [
            'categories' => $categories
        ]);
    }
}
