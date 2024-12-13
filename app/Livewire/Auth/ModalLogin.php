<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ModalLogin extends Component
{
    #[Validate('required', message: 'Your email cannot be empty !')]
    #[Validate('email:dns', message: 'Your email is not valid !')]
    public $email;
    #[Validate('required', message: 'Your password cannot be empty !')]
    public $password;

    public function login()
    {
        $credentials = $this->validate(['email' => 'required|email:dns', 'password' => 'required']);

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            Auth::user()->activity()->update(['is_logged_out' => 0]);
            session()->flash('successUpdate', 'Your have successfully logged in !');
            session()->flash('scrollToElementId', 'commentSection');
            return $this->redirect(request()->header('Referer'));
        }

        session()->flash('loginError', 'Login failed !');
        session()->flash('scrollToElementId', 'commentSection');
        return $this->redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.auth.modal-login');
    }
}
