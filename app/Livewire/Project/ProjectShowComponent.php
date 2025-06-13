<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectShowComponent extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }
    public function render()
    {
        return view('livewire.project.project-show-component');
    }
}
