<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-sky-500 dark:text-white">
                        Guestbook
                    </h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">
                        Hope you enjoy the website, if you have something to say or request, or just say hello, please
                        leave a message.
                        @auth
                        You login as role
                        @if (Auth::user()->is_admin)
                        <span class="text-sky-400">
                            Admin
                        </span>
                        @else
                        <span class="text-sky-400">
                            User
                        </span>
                        @endif
                        @else
                        You need to <a href="{{ route('login') }}" class="text-sky-400">login</a> to show the form.
                        @endauth
                    </h1>

                </div>

            </div>
            <div class="flex my-5 ">
                <div class="w-full px-4 sm:px-0">
                    <div class="w-full ">
                        @auth
                        <form method="POST" action="{{ route('guestbook.store') }}">
                            @csrf

                            <label for="message"
                                class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                message</label>
                            <textarea id="message" rows="4" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-transparent focus:ring-transparent dark:bg-gray-800 dark:border-transparent dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                                placeholder="Leave a message..."></textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />


                            <button type="submit"
                                class="py-2.5 px-5 mr-2 mt-5 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg   hover:bg-gray-50 hover:text-blue-700  dark:bg-gray-800 dark:text-gray-400  dark:hover:text-white dark:hover:bg-gray-700">
                                Send
                            </button>
                        </form>

                        @endauth
                        <div
                            class="mt-4 divide-y-2 divide-gray-100 rounded-lg bg-white dark:divide-gray-900 dark:bg-gray-800">
                            @foreach ($guestbooks as $guestbook)
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
                                    <p class="mt-2 text-base font-semibold text-gray-600 dark:text-gray-400">{{
                                        $guestbook->message }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</x-guest-layout>
