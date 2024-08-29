<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class TaskForm extends Form
{
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:5')]
    public $slug;
    #[Validate('required|min:20')]
    public $description;
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $priority;
    #[Validate('required')]
    public $deadline;

    public function createTask()
    {
        auth()->user()->tasks()->create($this->all());
        request()->session()->flash('success', __('Task created successfully.'));
    }
}
