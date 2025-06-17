<div>

    {{-- The best athlete wants his opponent at his best. --}}
    <div class="p-6 text-white min-h-screen bg-gray-900">
        <div class="wrapper max-w-7xl mx-auto">
            {{-- <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500"></button> --}}
            <button wire:click="$dispatch('createProject')">Crea progetto</button>

            <h2 class="text-lg font-bold mb-4">Progetti</h2>
            <!-- Card Progetti -->

            <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-5">
                @if (!$projects)
                    <div class="col-span-3 text-center">
                        <p class="text-gray-300">Non hai progetti disponibili.</p>
                    </div>
                @else
                    <div class="col-span-3 text-center">
                        <p class="text-gray-300">Ecco i tuoi progetti:</p>
                    </div>

                    @foreach ($projects as $project)
                        <div class="rounded-md border border-indigo-900 bg-indigo-700 text-center flex flex-col justify-between cursor-pointer "
                            wire:click="$dispatch('showProject', [{{ $project->id }}])">

                            <div class="bg-indigo-200 rounded-t-md w-full h-32">

                            </div>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold">{{ $project->name }}</h3>
                                <p class="text-base">{{ $project->description }}</p>
                            </div>
                            <div class="p-4">
                                <a class="text-indigo-300 cursor-pointer hover:text-white">Visualizza</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>



        </div>
    </div>
</div>
