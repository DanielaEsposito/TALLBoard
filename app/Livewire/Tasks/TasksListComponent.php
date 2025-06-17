<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class TasksListComponent extends Component
{
    public $search = '';
    public $projectId;

    public $tasksCompleted;
    public $tasksInProgress;
    public $tasksPending;

    public function mount($projectId = null)
    {
        $this->projectId = $projectId;
        $this->loadTasks();
    }

    public function updatedSearch()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $query = Task::query();

        if ($this->projectId) {
            $query->where('project_id', $this->projectId);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $tasks = $query->get();

        $this->tasksCompleted = $tasks->where('status', 'completed');
        $this->tasksInProgress = $tasks->where('status', 'in_progress');
        $this->tasksPending = $tasks->where('status', 'pending');
    }

    public function render()
    {
        return view('livewire.tasks.tasks-list-component');
    }
}
