<nav x-cloak x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div class="max-w-3xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center border-b-2 border-indigo-500 shrink-0">
                    {{-- <a href="{{ route('home') }}">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                    </a> --}}
                    <a href="{{ route('home') }}" class="font-bold sm:hidden dark:text-gray-200">Arif<span
                            class="text-indigo-500">Code</span></a>
                </div>

                <!-- Navigation Links -->
                {{-- sm:ml-6 --}}
                <div class="hidden space-x-4 sm:-my-px sm:flex">

                    <x-nav-link :href="route('home')" class="font-bold dark:text-gray-200">
                        Arif<span class="text-indigo-500">Code</span>
                    </x-nav-link>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                        {{ __('Posts') }}
                    </x-nav-link>
                    {{-- <x-nav-link :href="route('post')" :active="request()->routeIs('post')">
                        {{ __('Post') }}
                    </x-nav-link> --}}
                    <x-nav-link :href="route('portofolio')" :active="request()->routeIs('portofolio')">
                        {{ __('Portofolio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('guestbook.index')" :active="request()->routeIs('guestbook.index')">
                        {{ __('Guestbook') }}
                    </x-nav-link>

                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link> --}}
                </div>
            </div>

            <div class="flex">
                @guest
                <div class="hidden sm:flex sm:items-center sm:ml-6 gap-x-4">

                    @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-400 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                        Login
                    </a>
                    @endif
                    {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-400 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                        Register
                    </a>
                    @endif --}}


                </div>
                @endguest

                @auth
                <!-- User Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-400 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth
                {{-- Dark Mode Dropdown --}}
                <div class="hidden sm:flex sm:items-center sm:ml-2">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-400 transition duration-150 ease-in-out border border-transparent rounded-md hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                <div>
                                    {{-- Dark Mode --}}
                                    <svg id="theme-toggle-dark-icon" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                        </path>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <button x-on:click="darkMode = 'dark', showDropdown = false"
                                class="flex w-full px-3 py-2 text-sm text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                                <svg id="theme-toggle-dark-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                                <span class="ml-2">Dark</span>
                            </button>
                            <button x-on:click="darkMode = 'light', showDropdown = false"
                                class="flex w-full px-3 py-2 text-sm text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                                <svg id="theme-toggle-light-icon" class="w-5 h-5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2">Light</span>
                            </button>
                            <button x-on:click="darkMode = 'system', showDropdown = false"
                                class="flex w-full px-3 py-2 text-sm text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M2.25 5.25a3 3 0 013-3h13.5a3 3 0 013 3V15a3 3 0 01-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 01-.53 1.28h-9a.75.75 0 01-.53-1.28l.621-.622a2.25 2.25 0 00.659-1.59V18h-3a3 3 0 01-3-3V5.25zm1.5 0v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">System</span>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="p-4 sm:p-0">
        <div :class="{'block': open, 'hidden': ! open}" class="hidden bg-white rounded-md dark:bg-gray-800 sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                    {{ __('Posts') }}
                </x-responsive-nav-link>
                {{-- <x-responsive-nav-link :href="route('post')" :active="request()->routeIs('post')">
                    {{ __('Post') }}
                </x-responsive-nav-link> --}}
                <x-responsive-nav-link :href="route('portofolio')" :active="request()->routeIs('portofolio')">
                    {{ __('Portofolio') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('guestbook.index')" :active="request()->routeIs('guestbook.index')">
                    {{ __('Guestbook') }}
                </x-responsive-nav-link>

            </div>
            @guest
            <div class="pt-4 pb-4 border-t border-gray-200 dark:border-gray-600">

                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                @if (Route::has('register'))
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
                @endif

            </div>
            @endguest

            <div class="pt-4 pb-4 border-t border-gray-200 dark:border-gray-600">
                <button x-on:click="darkMode = 'dark', showDropdown = false"
                    class="flex w-full px-3 py-2 text-sm text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                    <svg id="theme-toggle-dark-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <span class="ml-2">Dark</span>
                </button>
                <button x-on:click="darkMode = 'light', showDropdown = false"
                    class="flex w-full px-3 py-2 text-sm text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                    <svg id="theme-toggle-light-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-2">Light</span>
                </button>
                <button x-on:click="darkMode = 'system', showDropdown = false"
                    class="flex w-full px-3 py-2 text-sm text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd"
                            d="M2.25 5.25a3 3 0 013-3h13.5a3 3 0 013 3V15a3 3 0 01-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 01-.53 1.28h-9a.75.75 0 01-.53-1.28l.621-.622a2.25 2.25 0 00.659-1.59V18h-3a3 3 0 01-3-3V5.25zm1.5 0v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">System</span>
                </button>

            </div>
            @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')">
                        {{ __('Dashboard') }}
                        </x-response-nav-link>
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                            </x-response-nav-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                </div>
            </div>
            @endauth

        </div>
    </div>

</nav>
