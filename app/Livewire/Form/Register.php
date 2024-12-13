<?php

namespace App\Livewire\Form;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{

    #[Validate]
    public $name = '';

    #[Validate]
    public $username = '';

    #[Validate]
    public $email = '';

    #[Validate]
    public $password = '';

    #[Validate]
    public $password_confirmation = '';


    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'username' => 'required|min:3|max:100|unique:users,username|alpha_dash',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => ['required', Password::min(6)->letters()->mixedCase()->numbers()],
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function save()
    {
        $this->validate();


        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole('visitor');

        event(new Registered($user));

        session()->flash('successRegister', 'Registration successful! Please login and check your email for verification.');

        return redirect('/login');
    }


    public function render()
    {
        return view('livewire.form.register');
    }

    // public function storeUser()
    // {
    //     $this->validate();
    //     // dd('berhasil');
    // }
}
