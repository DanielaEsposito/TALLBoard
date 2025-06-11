<nav x-data="{ open: false }"
    class="bg-white absolute dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-screen w-[300px]">
    <!-- Primary Navigation Menu -->
    <nav x-data="{ open: false }"
        class="bg-white  dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-screen w-[300px] fixed z-50">
        <div class="flex flex-col h-full justify-between">

            <div>
                <h1 class="text-3xl font-bold text-white py-3 text-center">TallBoard</h1>

                <div class="max-w-7xl ">
                    <div class="flex flex-col">
                        <div class="flex">

                            <ul class="w-full">
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
                            </ul>
                            {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                                    {{ __('Projects') }}
                                </x-nav-link>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer user/logout -->
            <div class="px-4 pb-4">
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
    </nav>


    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
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
</nav>
