<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectListComponent extends Component
{
    public $projects;
    public $search = '';
    /**l'uso della funzione mount serve per inizializzare i dati del componente.
     *  in questo modo assegno alla variabile pubblica $projects i progetti recuperati dal database
     * e non ho bisogno di passarli direttamente con compact nella funzione render*/
    public function mount()
    {
        $this->projects = Project::all();
    }
    public function render()
    {

        return view('livewire.project.project-list-component');
    }
}
