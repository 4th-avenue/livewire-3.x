<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\TaskForm;

class TasksForm extends Component
{
    public TaskForm $form;

    public function save()
    {
        $this->validate();
        $this->form->createTask();
        $this->dispatch('task-created');
    }

    #[On('edit-task')]
    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $this->form->setTask($task);
    }

    public function render()
    {
        return view('livewire.tasks.tasks-form');
    }
}
