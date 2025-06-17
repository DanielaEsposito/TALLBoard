<div>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Nome del Progetto</label>
            <input type="text" id="name" wire:model="name"
                class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-800 text-white" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300">Descrizione</label>
            <textarea id="description" wire:model="description"
                class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-800 text-white" required></textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-300">Scadenza</label>
            <input type="date" id="due_date" wire:model="due_date"
                class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-800 text-white" required>
            @error('due_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="search" class="block text-sm font-medium text-gray-300">Aggiungi Partecipanti</label>
            <input type="text" id="search" wire:model="search" placeholder="Cerca utenti per nome..."
                class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-800 text-white" />

            {{-- Risultati ricerca --}}
            @if (strlen($search) >= 2)
                <ul class="mt-2 border border-gray-600 rounded-md bg-gray-700 text-white max-h-40 overflow-y-auto">
                    @forelse($users as $user)
                        <li wire:click="addUser({{ $user->id }})"
                            class="px-3 py-2 hover:bg-gray-600 cursor-pointer flex items-center space-x-2">
                            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}"
                                class="w-6 h-6 rounded-full" />
                            <span>{{ $user->name }}</span>
                        </li>
                    @empty
                        <li class="px-3 py-2 text-sm text-gray-400">Nessun utente trovato.</li>
                    @endforelse
                </ul>
            @endif
        </div>

        {{-- Utenti selezionati --}}
        @if (count($selectedUsers) > 0)
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300">Partecipanti Selezionati</label>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach ($selectedUsers as $userId)
                        @php $user = \App\Models\User::find($userId); @endphp
                        <div class="flex items-center bg-blue-700 text-white px-2 py-1 rounded-full">
                            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}"
                                class="w-5 h-5 rounded-full mr-1" />
                            <span class="text-sm">{{ $user->name }}</span>
                            <button type="button" wire:click="removeUser({{ $user->id }})"
                                class="ml-2 text-red-300 hover:text-red-500 font-bold">&times;</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-300">Stato</label>
            <select id="status" wire:model="status"
                class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-800 text-white" required>
                <option value="">Seleziona Stato</option>
                <option value="active">In Corso</option>
                <option value="completed">Completato</option>
                <option value="archived">Archiviato</option>
            </select>
            @error('status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500">Crea
                    Progetto</button>
            </div>
    </form>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mt-6 rounded">
            {{ session('message') }}
        </div>
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500"
            wire:click="$dispatch('backToList')">Torna alla Lista</button>
    @endif
</div>
