<div>
    {{-- <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cerca task..."
        class="border rounded px-2 py-1 mb-4 w-full" /> --}}

    <div class="grid grid-cols-3 gap-4">

        {{-- Completed --}}
        <div class="bg-green-400 p-4 rounded-lg shadow">

            <h2 class="text-xl font-bold mb-2">Completati</h2>

            @forelse ($tasksCompleted as $task)
                <div class="mb-2">
                    <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    <p class="text-sm text-gray-500">Scadenza: {{ $task->due_date }}</p>
                </div>
            @empty
                <p class="text-gray-600">Nessun task completato.</p>
            @endforelse
        </div>

        {{-- In Progress --}}
        <div class="bg-yellow-400 p-4 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-2">In Corso</h2>
            @forelse ($tasksInProgress as $task)
                <div class="mb-2">
                    <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    <p class="text-sm text-gray-500">Scadenza: {{ $task->due_date }}</p>
                </div>
            @empty
                <p class="text-gray-600">Nessun task in corso.</p>
            @endforelse
        </div>

        {{-- Pending --}}
        <div class="bg-red-400 p-4 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-2">In Attesa</h2>
            @forelse ($tasksPending as $task)
                <div class="mb-2">
                    <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    <p class="text-sm text-gray-500">Scadenza: {{ $task->due_date }}</p>
                </div>
            @empty
                <p class="text-gray-600">Nessun task in attesa.</p>
            @endforelse
        </div>

    </div>
</div>
