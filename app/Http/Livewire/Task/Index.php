<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public $search, $status;


    public function render()
    {
        $search= $this->search;
        $status= $this->status;
        return view('livewire.task.index',[
            'tasks'=> Task::when($search, function($query,$search){
                return $query->where('title',"LIKE", '%'.$search.'%');
            })->when($status,function($query,$status){
                return $query->where('status', $status);
            })->
            latest()->paginate(5),
        ]);
    }
}
