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
                        </span>
                        @endif
                        @else
                        You need to <a href="{{ route('login') }}" class="text-sky-400">login</a>
                        @if (Route::has('register'))
                        or <a href="{{ route('register') }}" class="text-sky-400">register</a>
                        @endif
                        to show the form.
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
            <div class="flex my-5 min-h-screen">
                <div class="w-full px-4 sm:px-0">
                    <div class="w-full ">
                        @auth
                        <form method="POST" action="{{ route('guestbook.store') }}">
                            @csrf

                            {{-- <label for="message"
                                class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                message</label> --}}
                            <textarea id="message" rows="3" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-transparent focus:ring-transparent dark:bg-gray-800 dark:border-transparent dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                                maxlength="255" placeholder="Leave a message...">{{ old('message') }}</textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />


                            <button type="submit"
                                class="mt-5 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                Send
                            </button>
                        </form>

                        @endauth
                        <div
                            class="mt-4 divide-y-2 divide-gray-100 rounded-lg bg-white dark:divide-gray-900 dark:bg-gray-800">
                            @foreach ($pinned_guestbooks as $guestbook)
                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <div>

                                                <span class="text-base text-sky-500 dark:text-sky-500">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                {{-- @if ($guestbook->user_id == Auth::id())
                                                <span class="text-base text-yellow-500 dark:text-yellow-500">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                @else
                                                @endif --}}
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
                                                @if (Auth::user()->is_admin)

                                                <form method="POST" action="{{ route('guestbook.unpin', $guestbook) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <x-dropdown-link :href="route('guestbook.unpin', $guestbook)"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Unpin') }}
                                                    </x-dropdown-link>
                                                </form>
                                                @endif
                                                <x-dropdown-link :href="route('guestbook.edit', $guestbook)">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
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
                                    <p class="mt-2 text-notmal text-gray-600 dark:text-gray-400">{{
                                        $guestbook->message }}
                                    </p>
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <div
                            class="mt-4 divide-y-2 divide-gray-100 rounded-lg bg-white dark:divide-gray-900 dark:bg-gray-800">

                            @forelse ($guestbooks as $guestbook)
                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <div>

                                                @if ($guestbook->user_id == Auth::id())
                                                <span class="text-base text-yellow-500 dark:text-yellow-500">
                                                    {{$guestbook->user->name }}
                                                </span>
                                                @else
                                                <span class="text-base text-sky-500 dark:text-sky-500">
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
                                                @if (Auth::user()->is_admin == true)
                                                <form method="POST" action="{{ route('guestbook.pin', $guestbook) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <x-dropdown-link :href="route('guestbook.pin', $guestbook)"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Pin') }}
                                                    </x-dropdown-link>
                                                </form>
                                                @endif
                                                <x-dropdown-link :href="route('guestbook.edit', $guestbook)">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
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
                                    <p class="mt-2 text-notmal text-gray-600 dark:text-gray-400">{{
                                        $guestbook->message }}
                                    </p>
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
