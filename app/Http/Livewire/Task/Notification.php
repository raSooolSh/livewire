<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;

class Notification extends Component
{
    protected $listeners=[
        'flashMessage',
    ];

    public function flashMessage($status,$msg){
        session()->flash($status,$msg);
    }
    public function render()
    {
        return view('livewire.task.notification');
    }
}
