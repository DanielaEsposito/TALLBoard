@extends('layouts.app')

@section('content')
    <div class="p-6 text-white min-h-screen bg-gray-900">
        <div class="wrapper max-w-7xl mx-auto">
        
            <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-5 w-full">
                <!-- Card Dashboard -->
                <div class=" bg-indigo-600 md:col-span-2 p-6 rounded-lg shadow-lg flex flex-col justify-center items-start">
                    <h1 class="text-3xl font-bold mb-2">Dashboard</h1>
                    <p class="text-lg">Benvenuto nella tua dashboard!</p>
                    <p class="text-lg">Qui puoi gestire le tue attività e i tuoi progetti.</p>
                </div>
                <!-- Card Mannaggia -->
                <div class=" bg-indigo-600 p-6 rounded-lg shadow-lg flex flex-col justify-center items-start">
                    <h1 class="text-3xl font-bold mb-2">Mannaggia</h1>
                    <p class="text-lg">Benvenuto nella tua dashboard!</p>
                    <p class="text-lg">Qui puoi gestire le tue attività e i tuoi progetti.</p>
                </div>
                <!-- Card Ultimi progetti aperti -->
                <div class=" bg-indigo-600 md:col-span-2 p-6 rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold mb-4">Ultimi progetti aperti</h1>
                    <!-- Correzione del typo: flex-wrap al posto di flex-wrapp-3 -->
                    <div class="flex flex-wrap gap-4 justify-around">
                        <div
                            class="rounded-md border border-indigo-900 bg-indigo-700 text-center flex-1 min-w-[200px] max-w-[calc(33%-1rem)]">
                            <div class="p-3 border-b border-indigo-900 text-xl font-semibold">Progetto 1</div>
                            <div class="p-3 text-base">Descrizione progetto 1</div>
                        </div>
                        <div
                            class="rounded-md border border-indigo-900 bg-indigo-700 text-center flex-1 min-w-[200px] max-w-[calc(33%-1rem)]">
                            <div class="p-3 border-b border-indigo-900 text-xl font-semibold">Progetto 2</div>
                            <div class="p-3 text-base">Descrizione progetto 2</div>
                        </div>
                        <div
                            class="rounded-md border border-indigo-900 bg-indigo-700 text-center flex-1 min-w-[200px] max-w-[calc(33%-1rem)]">
                            <div class="p-3 border-b border-indigo-900 text-xl font-semibold">Progetto 3</div>
                            <div class="p-3 text-base">Descrizione progetto 3</div>
                        </div>
                    </div>
                </div>
                <!-- Card Notifiche -->
                <div class=" bg-indigo-600 md:row-span-2 p-6 rounded-lg shadow-lg">
                    <h1 class="text-3xl font-bold mb-4">Notifiche</h1>
                    <ul class="list-disc list-inside">
                        <li>Nuova notifica importante!</li>
                        <li>Promemoria: scadenza progetto X</li>
                        <li>Aggiornamento: compito Y completato</li>
                    </ul>
                </div>
                <!-- Card Note personali -->
                <div class=" bg-indigo-600 col-span-full p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-3xl mb-4">Note personali</h1>
                        <div>

                            <button class="bg-indigo-500 text-white p-2 rounded-md"><i
                                    class="fa-solid fa-plus text-white"></i></button>
                        </div>

                    </div>
                    <div class="grid md:grid-cols-4 sm:grid-cols-1 gap-5">

                        <div class="bg-indigo-700 p-4 rounded-md">
                            <h2 class="font-bold">Nota 1</h2>
                            <p>Dettagli sulla nota 1</p>
                        </div>
                        <div class="bg-indigo-700 p-4 rounded-md">
                            <h2 class="font-bold">Nota 2</h2>
                            <p>Dettagli sulla nota 2</p>
                        </div>
                        <div class="bg-indigo-700 p-4 rounded-md">
                            <h2 class="font-bold">Nota 3</h2>
                            <p>Dettagli sulla nota 3</p>
                        </div>
                        <div class="bg-indigo-700 p-4 rounded-md">
                            <h2 class="font-bold">Nota 4</h2>
                            <p>Dettagli sulla nota 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
