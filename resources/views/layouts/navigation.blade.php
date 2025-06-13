<!-- Primary Navigation Menu -->
<nav x-data="{ open: false }"
    class="bg-indigo-600 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 md:h-screen md:w-[300px] sm:w-screen md:fixed z-50">
    <div class="flex flex-col h-full justify-between ">

        <div>
            <div class="md:block p-3 flex justify-between">

                <h1 class="text-3xl font-bold text-white py-3 md:text-center">TallBoard</h1>
                <button
                    class="text-white md:hidden sm:block px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    x-on:click="open = !open">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <div class="max-w-7xl hidden md:block">
                <div class="flex flex-col">
                    <div class="flex">

                        <ul class="w-full ">
                            <li>
                                <div class="w-full">
                                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-responsive-nav-link>
                                </div>
                            </li>
                            <li>
                                <div class="w-full ">
                                    <x-responsive-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                                        {{ __('Projects') }}
                                    </x-responsive-nav-link>
                                </div>
                            </li>
                            <li>
                                <div class="w-full">
                                    <x-responsive-nav-link :href="route('notes')" :active="request()->routeIs('notes')">
                                        {{ __('Note') }}
                                    </x-responsive-nav-link>
                                </div>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>

        <!-- Footer user/logout -->
        <div class="px-4 pb-4 hidden md:block">
            <a href="{{ route('profile.edit') }}" class="text-white">
                {{ Auth::user()->name }}
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="text-white">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                {{ __('Projects') }}
            </x-responsive-nav-link>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">


                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ Auth::user()->name }}
                    </x-responsive-nav-link>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('notes')">
                        {{ __('Note') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Authentication -->
                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>

</nav>
