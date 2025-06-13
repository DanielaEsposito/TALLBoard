<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProjectFormComponent extends Component
{
    public $project;
    public $name;
    public $description;
    public $due_date;
    public $status;
    public $projectId;
    public $search = '';
    public $selectedUsers = [];

    public function mount($id = null)
    {
        if ($id) {
            $project = Project::findOrFail($id);
            $this->projectId = $project->id;
            $this->name = $project->name;
            $this->description = $project->description;
            $this->due_date = $project->due_date;
            $this->status = $project->status;

            // Pre-carica gli utenti assegnati se si sta modificando
            /**il metodo pluck è simile al metoto get() con la differenza che pluck mi restituisce solo i valori di una colonna
             * mentre il metodo get() mi restituisce un array di oggetti
             * pluck('users.id') mi restituisce un array di id degli utenti assegnati al progetto
             * toArray() converte la collection in un array semplice
             */
            $this->selectedUsers = $project->users()->pluck('users.id')->toArray();
        }
    }

    public function updatedSearch()
    {
        // Nessun codice richiesto: Livewire aggiorna automaticamente
    }

    public function addUser($id)
    {
        if (!in_array($id, $this->selectedUsers)) {
            $this->selectedUsers[] = $id;
        }
    }

    public function removeUser($id)
    {
        $this->selectedUsers = array_filter($this->selectedUsers, fn($user) => $user != $id);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:active,archived,completed',
        ]);

        if ($this->projectId) {
            $project = Project::findOrFail($this->projectId);
            $project->update([
                "name" => $this->name,
                "description" => $this->description,
                "due_date" => $this->due_date,
                "status" => $this->status,
            ]);
        } else {
            $project = Project::create([
                "name" => $this->name,
                "description" => $this->description,
                "due_date" => $this->due_date,
                "status" => $this->status,
            ]);
        }

        // Aggiunge l'utente autenticato e sincronizza i partecipanti
        /* array_merge unisce i due array e ne crea uni solo, array_unique rimuove i duplicati
        sync() si occupa di sincronizzare i partecipanti nel database 
        */

        $participants = array_unique(array_merge($this->selectedUsers, [Auth::id()]));
        $project->users()->sync($participants);

        session()->flash('message', $this->projectId ? 'Project updated successfully.' : 'Project created successfully.');
    }

    public function render()
    {
        $users = [];

        if (strlen($this->search) >= 2) {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                //esclude gli utenti già selezionati e l'utente autenticato
                ->whereNotIn('id', $this->selectedUsers)
                ->where('id', '!=', Auth::id())
                ->get();
        }

        return view('livewire.project.project-form-component', [
            'users' => $users,
        ]);
    }
}
