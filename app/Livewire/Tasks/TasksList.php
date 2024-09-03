<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class TasksList extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('skeleton');
    }

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);
        $task->update([
            'status' => $status
        ]);

        unset($this->tasksByStatus);
    }

    public function delete(Task $task)
    {
        $task->delete();

        unset($this->tasksByStatus);
    }

    #[Computed]
    public function tasks()
    {
        return auth()->user()->tasks()->orderBy('id', 'desc')->paginate(5);
    }

    #[Computed(persist: true, key: 'user_tasks_by_status')]
    public function tasksByStatus()
    {
        return auth()->user()->tasks()->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->orderBy('status', 'desc')
            ->get();
    }

    #[On('task-created')]
    public function taskCreated()
    {
        unset($this->tasksByStatus);
    }

    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}
