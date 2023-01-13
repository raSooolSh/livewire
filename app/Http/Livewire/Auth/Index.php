<?php

namespace App\Http\Livewire\Auth;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{
    public $showRegister = false;

    protected $listeners=[
        'isRegisterForm',
    ];

    public function isRegisterForm($status){
        $this->showRegister = $status;
    }

    public function render()
    {
        return view('livewire.auth.index')->extends('layouts.app')->section('content');
    }
}
