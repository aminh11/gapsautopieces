<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password')]
class ForgotPasswordPage extends Component
{
    public $email;
//Méthode save() Déclenchée quand l’utilisateur clique sur “Envoyer”
    public function save()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email|max:255'
        ]);
//Envoi du lien de réinitialisation
        $status = Password::sendResetLink(['email' => $this->email]);
//Retour utilisateur si tout s’est bien passé
        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Password reset link has been sent to your email address!');
            $this->email = '';
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
