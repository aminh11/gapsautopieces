<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Page Conexion - GAPS')]

class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }
}
