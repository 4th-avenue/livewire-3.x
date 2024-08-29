<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Livewire\Forms\TaskForm;

class TasksIndex extends Component
{
    public TaskForm $form;

    public function save()
    {
        $this->validate();
        $this->form->createTask();
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.tasks.tasks-index')->layout('layouts.app');
    }
}
