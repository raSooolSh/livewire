<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public $title, $content, $status = 'pending';

    protected $rules = [
        'title' => ['required'],
        'content' => ['required'],
        'status' => ['required', 'in:completed,pending'],
    ];

    public function submit()
    {
        $this->validate();

        try {
            Task::create([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status
            ]);

            $this->emitTo('task.notification','flashMessage','Success','New task added.');
            $this->emitTo('task.index','refresh');
            $this->reset(['title','content','status']);
        } catch (\Exception $e) {
            $this->emitTo('task.notification','flashMessage','Error','Try again...');
        }
    }
    public function render()
    {
        return view('livewire.task.create');
    }
}
