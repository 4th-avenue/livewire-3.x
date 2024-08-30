<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\On;

class TasksList extends Component
{
    #[On('task-created')]

    public function render()
    {
        return view('livewire.tasks.tasks-list', [
            'tasks' => auth()->user()->tasks()->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
