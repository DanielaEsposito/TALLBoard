<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Laravel</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @livewireStyles
</head>

<body>
    <div class="flex h-screen w-screen relative" x-data="{ register: false }">
        <!-- Overlay che si sposta -->
        <div class="absolute top-0 left-0 h-full w-1/2 bg-indigo-600 text-white flex items-center justify-center transition-transform duration-700 z-10 transform"
            :class="register ? 'translate-x-full' : 'translate-x-0'">
            <div class="text-center px-6">
                <h1 class="text-3xl font-bold mb-2">Benvenuto!</h1>
                <p class="text-lg">Organizza le tue attività in modo semplice ed efficace.</p>
            </div>
        </div>

        <!-- Colonna Login -->
        <div class="w-1/2 flex items-center flex-col justify-center bg-white z-0">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Login</h1>
            <!-- Qui potresti mettere il form di login -->
            <button x-on:click="register = false" class="text-blue-500 underline mt-4">Vai a Registrazione</button>
        </div>

        <!-- Colonna Registrazione -->
        <div class="w-1/2 flex items-center flex-col justify-center bg-gray-100 z-0">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Registrati</h1>
            <!-- Qui potresti mettere il form di registrazione -->
            <button x-on:click="register = true" class="text-blue-500 underline mt-4">Torna al Login</button>
        </div>
    </div>

    @livewireScripts
</body>

</html>
