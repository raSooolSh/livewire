<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{
    public $task, $title, $content, $status = 'pending';

    protected $rules = [
        'title' => ['required'],
        'content' => ['required'],
        'status' => ['required', 'in:completed,pending'],
    ];

    protected $listeners = [
        'showEditModal',
    ];

    public function showEditModal(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->content = $task->content;
        $this->status = $task->status;
        $this->emit('openEditModalOnTasks', $task);
    }

    public function submit()
    {
        $this->validate();

        try {
            $this->task->update([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status
            ]);

            $this->emitTo('task.notification', 'flashMessage', 'Success', 'task updated.');
            $this->emitTo('task.index', 'refresh');
            $this->emit('closeEditModalOnTasks');
        } catch (\Exception $e) {
            $this->emitTo('task.notification', 'flashMessage', 'Error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
