<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str; 
#[Title('Reset Password')]
class ResetPasswordPage extends Component
{
    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;
//Méthode mount appelée automatiquement à l’affichage du composant. Elle récupère le token fourni dans l’URL.
    public function mount ($token){
        $this->token = $token;
    }
   //La méthode save() permet de Valider les champs du formulaire 
    public function save(){
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        //Appeler la méthode Laravel Password::reset()
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            //Mettre à jour le mot de passe dans la base de données 
            function ($user, string $password){
                $password = $this->password;
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user)); 
            }
        
        );
        //afficher une erreur
        //Si la réinitialisation est un succès 
        //Sinon Token invalide, email incorrect, ou autre erreur.
        return $status == Password::PASSWORD_RESET
            ? redirect('login') : session()->flash('error', 'Somthing went wrong');

    }
    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
