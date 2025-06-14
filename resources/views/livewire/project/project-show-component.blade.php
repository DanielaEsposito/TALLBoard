<div>
    <div class="p-6 text-white min-h-screen bg-gray-900">
        <div class="wrapper max-w-7xl mx-auto">

            <h2 class="text-lg font-bold mb-4">Dettagli Progetto</h2>

            @if ($project)
                <div class="bg-gray-800 rounded-md p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $project->name }}</h3>
                    <p class="text-gray-300 mb-4">{{ $project->description }}</p>
                    <p class="text-gray-400 mb-2">Scadenza: {{ $project->due_date->format('d/m/Y') }}</p>
                    <p class="text-gray-400 mb-2">Stato: {{ ucfirst($project->status) }}</p>
                </div>
            @else
                <div class="text-center">
                    <p class="text-gray-300">Nessun progetto trovato.</p>
                </div>
            @endif

        </div>
    </div>
    <div class="p-6 text-white min-h-screen bg-gray-900">
        <div class="wrapper max-w-7xl mx-auto">
            <h2 class="text-lg font-bold mb-4">Attività del Progetto</h2>
            @if (!$project->tasks)
                <p class="text-gray-300">Non ci sono attività associate a questo progetto.</p>
            @endif

        </div>
    </div>

</div>
