<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Register extends Component
{
    public $email = "";
    public $name = "";
    public $password = "";
    public $password_confrimation = "";
    public $canBeSubmited = false;

    protected $rules = [
        'email' => ['required', 'email', 'unique:users,email'],
        'name' => ['required', 'string', 'min:3'],
        'password' => ['required', 'min:6'],
        'password_confrimation' => ['required_with:password', 'same:password'],
    ];

    public function updated($proprty)
    {
        $validator = Validator::make(['email' => $this->email, 'name' => $this->name, 'password' => $this->password, 'password_confrimation' => $this->password_confrimation,], $this->rules);
        if ($validator->fails()) {
            $this->canBeSubmited = false;
        } else {
            $this->canBeSubmited = true;
        }
        
        $this->validateOnly($proprty);
    }

    public function register()
    {
        $this->validate();
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => password_hash($this->password, null),
        ]);

        auth()->attempt(['email' => $this->email, 'password' => $this->password]);
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
