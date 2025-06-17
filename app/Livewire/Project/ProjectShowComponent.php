<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectShowComponent extends Component
{
    public $project;
    public $projectId;
    public function mount()
    {
        if ($this->projectId) {

            $this->project = Project::find($this->projectId);
        }
    }
    public function render()
    {

        return view('livewire.project.project-show-component');
    }
}
