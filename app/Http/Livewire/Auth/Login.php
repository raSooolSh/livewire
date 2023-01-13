<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;


    protected $rules = [
        'email' => 'required',
        'password' => 'required',
    ];

    public function updated($proprety)
    {
        $this->validateOnly($proprety);
    }


    public function login()
    {
        $this->validate();
        $user = User::whereEmail($this->email)->first();

        if (!is_null($user)) {
            if (Hash::check($this->password, $user->password)) {
                auth()->login($user, $this->remember);
                return redirect('/');
            } else {
                session()->flash('error', 'You\'r password is wrong.');
            }
        } else {
            session()->flash('error', 'You haven\'t registred yet.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
