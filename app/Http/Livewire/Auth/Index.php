<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Index extends Component
{
    public $showRegister = false;

    public function render()
    {
        return view('livewire.auth.index')->extends('layouts.app')->section('content');
    }
}
