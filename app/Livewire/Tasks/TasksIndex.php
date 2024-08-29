<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\Rule;

class TasksIndex extends Component
{
    #[Rule('required|min:5')]
    public $title;
    #[Rule('required|min:5')]
    public $slug;
    #[Rule('required|min:20')]
    public $description;
    #[Rule('required')]
    public $status;
    #[Rule('required')]
    public $priority;
    #[Rule('required')]
    public $deadline;

    public function save()
    {
        $this->validate();
        auth()->user()->tasks()->create($this->only(['title', 'slug', 'description', 'status', 'priority', 'deadline']));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.tasks.tasks-index')->layout('layouts.app');
    }
}
