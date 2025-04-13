<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Register')]
class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;

    //utilisateur enregistrez
    public function save(){
        $this->validate([
            'name' =>'required|max: 255',
            'email'=> 'required|email| unique:users|max:255',
            'password' => 'required|min:6|max:255',
        ]);
        //enregister dans la base de données
        $user = User::create([
            'name' => $this->name,
            'email'=> $this->email,
            'password' => Hash::make($this->password),
        ]);
        //méthode de connexion utilisatuer
        auth()->login($user);

        //retour page acceuil
        return redirect()->intended();


    }
    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
