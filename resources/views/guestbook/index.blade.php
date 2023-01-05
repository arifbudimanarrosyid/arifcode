<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-sky-500 dark:text-white">
                        Guestbook
                    </h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">
                        Hope you enjoy the website, if you have something to say or request, or just say hello, please
                        leave a message.
                        @auth
                        You login as
                        <span class="text-sky-400">
                            {{ Auth::user()->name}}
                        </span>
                        with role
                        @if (Auth::user()->is_admin)
                        <span class="text-sky-400">
                            Admin
                        </span>
                        @else
                        <span class="text-sky-400">User
                        </span>.
                        @endif
                        @else
                        You need to <a href="{{ route('login') }}" class="text-sky-400">login</a>
                        @if (Route::has('register'))
                        or <a href="{{ route('register') }}" class="text-sky-400">register</a>
                        @endif
                        to show guestbook form.
                        @endauth
                    </p>

                    @auth
                    @else
                    <p class="mt-4 text-red-400 dark:text-red-300">
                        Your information is only used to display your name and message.
                    </p>
                    @endauth
                </div>
            </div>
            <div class="flex min-h-screen my-5">
                <div class="w-full px-4 sm:px-0">
                    <div class="w-full ">
                        @auth
                        <form method="POST" action="{{ route('guestbook.store') }}">
                            @csrf
                            <textarea id="message" rows="3" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 focus:ring-transparent dark:bg-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                                maxlength="255" placeholder="Leave a message..."
                                required>{{ old('message') }}</textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white rounded-lg bg-sky-700 focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                Send
                            </button>
                        </form>
                        @endauth
                        @if (session('success'))
                        <div x-cloak x-show="showAlert" x-data="{ showAlert: true }"
                            x-init="setTimeout(() => showAlert = false, 5000)" role="alert" class="alert">
                            <div class="flex p-4 my-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-bold">{{ session('success') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (session('danger'))
                        <div x-cloak x-show="showAlert" x-data="{ showAlert: true }"
                            x-init="setTimeout(() => showAlert = false, 5000)" role="alert" class="alert">

                            <div class="flex p-4 my-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-bold">{{ session('danger') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div
                            class="mt-4 bg-white border-2 border-gray-200 divide-y-2 divide-gray-100 rounded-lg dark:border-gray-700 dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($pinned_guestbooks as $guestbook)
                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <div>
                                                @if ($guestbook->user_id == Auth::id())
                                                <span class="text-base text-sky-500 dark:text-sky-500">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                @else
                                                <span class="text-base text-gray-400 dark:text-gray-400">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                @endif
                                            </div>
                                            <div>
                                                <small class="text-sm text-gray-400 sm:ml-2 dark:text-gray-400">
                                                    {{ $guestbook->created_at->diffForHumans() }}
                                                </small>
                                                {{-- @unless ($guestbook->created_at->eq($guestbook->updated_at)) --}}
                                                @unless ($guestbook->created_at == $guestbook->updated_at)
                                                <small class="text-sm text-gray-400 dark:text-gray-400"> &middot; {{
                                                    __('edited')
                                                    }}</small>
                                                @endunless
                                                @if ($guestbook->is_pinned == true)

                                                <small class="text-sm text-gray-400 dark:text-gray-400">
                                                    &middot; pinned
                                                </small>
                                                @endif

                                            </div>
                                        </div>
                                        @auth
                                        @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-4 h-4 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                @can('admin')
                                                <form method="POST" action="{{ route('guestbook.unpin', $guestbook) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <x-dropdown-link :href="route('guestbook.unpin', $guestbook)"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Unpin') }}
                                                    </x-dropdown-link>
                                                </form>
                                                @endcan
                                                <form method="POST"
                                                    action="{{ route('guestbook.destroy', $guestbook) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('guestbook.destroy', $guestbook)"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                        @endif
                                        @endauth
                                    </div>
                                    <p class="mt-2 text-gray-600 text-notmal dark:text-gray-400">{{
                                        $guestbook->message }}
                                    </p>
                                    @auth
                                    @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                    <div x-data="{open:false}">
                                        <button x-on:click="open = !open" x-text="open ? 'Close' : 'Edit'"
                                            class="mt-2 text-gray-600 text-normal dark:text-gray-400">
                                        </button>
                                        <div x-show="open" x-cloak class="mt-2">
                                            <form method="POST" action="{{ route('guestbook.update', $guestbook) }}">
                                                @csrf
                                                @method('patch')
                                                <textarea id="message" rows="3" name="message"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 focus:ring-transparent dark:bg-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                                                    maxlength="255"
                                                    placeholder="Leave a message...">{{ old('message', $guestbook->message) }}</textarea>
                                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white rounded-lg bg-sky-700 focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                                    Save
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                            @empty
                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <p class="text-base font-normal text-gray-400 dark:text-gray-400">
                                                No pinned messages yet.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div
                            class="mt-4 bg-white border-2 border-gray-200 divide-y-2 divide-gray-100 rounded-lg dark:border-gray-700 dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($guestbooks as $guestbook)
                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <div>
                                                @if ($guestbook->user_id == Auth::id())
                                                <span class="text-base text-sky-500 dark:text-sky-500">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                @else
                                                <span class="text-base text-gray-400 dark:text-gray-400">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                @endif
                                            </div>
                                            <div>
                                                <small class="text-sm text-gray-400 sm:ml-2 dark:text-gray-400">
                                                    {{ $guestbook->created_at->diffForHumans() }}
                                                </small>
                                                {{-- @unless ($guestbook->created_at->eq($guestbook->updated_at)) --}}
                                                @unless ($guestbook->created_at == $guestbook->updated_at)
                                                <small class="text-sm text-gray-400 dark:text-gray-400"> &middot; {{
                                                    __('edited')
                                                    }}</small>
                                                @endunless
                                            </div>
                                        </div>

                                        @auth
                                        @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-4 h-4 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                @can('admin')
                                                <form method="POST" action="{{ route('guestbook.pin', $guestbook) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <x-dropdown-link :href="route('guestbook.pin', $guestbook)"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Pin') }}
                                                    </x-dropdown-link>
                                                </form>
                                                @endcan
                                                <form method="POST"
                                                    action="{{ route('guestbook.destroy', $guestbook) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('guestbook.destroy', $guestbook)"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                        @endif
                                        @endauth
                                    </div>
                                    <p class="mt-2 text-gray-600 text-notmal dark:text-gray-400">{{
                                        $guestbook->message }}
                                    </p>
                                    @auth
                                    @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true)
                                    <div x-data="{open:false}">
                                        <button x-on:click="open = !open" x-text="open ? 'Close' : 'Edit'"
                                            class="mt-2 text-gray-600 text-normal dark:text-gray-400">
                                        </button>
                                        <div x-show="open" x-cloak class="mt-2">
                                            <form method="POST" action="{{ route('guestbook.update', $guestbook) }}">
                                                @csrf
                                                @method('patch')
                                                <textarea id="message" rows="3" name="message"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 focus:ring-transparent dark:bg-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                                                    maxlength="255"
                                                    placeholder="Leave a message...">{{ old('message', $guestbook->message) }}</textarea>
                                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white rounded-lg bg-sky-700 focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                                    Save
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                            @empty
                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <p class="text-base font-normal text-gray-400 dark:text-gray-400">
                                                No messages yet. Be the first to leave a message.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</x-guest-layout>
