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
                <p class="text-lg mt-4" x-text="register"></p>
            </div>
        </div>

        <!-- Colonna Login -->
        <div class="w-1/2 flex items-center flex-col justify-center bg-white z-0"
            :class="register ? 'visible' : 'invisible'">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Login</h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block text-center mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm  text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex flex-col items-center mt-4 mb-4 space-y-2">
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex flex-col items-center mt-4 mb-4 space-y-2">

                    <span class=" ms-2 text-sm text-gray-600 dark:text-gray-400">Non hai un account ?</span>
                    <button x-on:click="register = false" class="text-blue-500 underline mt-2">Registrati</button>
                </div>
            </form>
        </div>

        <!-- Colonna Registrazione -->
        <div class="w-1/2 flex items-center flex-col justify-center z-0" :class="register ? 'invisible' : 'visible'">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Registrati</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="text-center mt-4">


                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
                <div class="flex flex-col items-center mt-4 mb-4 space-y-2">
                    <span class=" ms-2 text-sm text-gray-600 dark:text-gray-400">Hai già un account ?</span>
                    <button x-on:click="register = true" class="text-blue-500 underline mt-4">Torna al Login</button>
                </div>
            </form>
        </div>
    </div>

    @livewireScripts
</body>

</html>
