<?php

namespace App\Livewire\Project;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ProjectPageComponent extends Component
{
    public string $view = 'list'; // 'list', 'show', 'form'
    public $selectedProjectId = null;

    protected $listeners = [
        'showProject' => 'showProject',
        'editProject' => 'editProject',
        'createProject' => 'createProject',
        'backToList' => 'backToList'
    ];

    public function showProject(int $id)
    {
        $this->selectedProjectId = $id;
        $this->view = 'show';
    }

    public function editProject($id)
    {
        $this->selectedProjectId = $id;
        $this->view = 'form';
    }

    public function createProject()
    {

        $this->selectedProjectId = null;
        $this->view = 'form';
    }

    public function backToList()
    {
        $this->view = 'list';
    }
    //questo mi serve per estendere il layout alla view del componente senza duplicarlo o avere errore.
    // ricordati che serve slot all'interno del fil layout e non yield 
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.project.project-page-component');
    }
}
