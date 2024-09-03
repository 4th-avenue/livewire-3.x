<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Task;
use Livewire\Attributes\Validate;

class TaskForm extends Form
{
    public ?Task $task;
    public $editMode = false;
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

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->editMode = true;
        $this->title = $task->title;
        $this->slug = $task->slug;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->deadline = $task->deadline->format('Y-m-d');
        $this->priority = $task->priority;
    }

    public function createTask()
    {
        if ($this->editMode) {
            $this->task->update($this->all());
            $this->reset();
            request()->session()->flash('success', __('Task updated successfully'));
        } else {
            auth()->user()->tasks()->create($this->all());
            $this->reset();
            request()->session()->flash('success', __('Task created successfully'));
        }
    }
}
