<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page Acceuil - GAPS')]
class HomePage extends Component
{
    public function render(){
        $brands = Brand::where('is_active', 1)->get();
        $pieceoccassion = Category::where('is_active',1)->get();
        return view('livewire.home-page' , [
            'brands' => $brands,
            'pieceoccassion' => $pieceoccassion,
        ]);
    }
    
}
