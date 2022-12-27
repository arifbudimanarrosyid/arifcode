<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Blog --}}
            <div class="mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h5 class="mb-2 font-bold tracking-tight @if ($post->is_featured)
                        text-orange-500 dark:text-orange-400
                        @else
                        text-indigo-500 dark:text-indigo-400
                    @endif ">
                        {{$post->category->title }}
                    </h5>
                    <h1 class="text-4xl font-bold text-gray-800 underline capitalize @if ($post->is_featured)
                        decoration-orange-500
                        @else
                        decoration-indigo-500
                        @endif  dark:text-white">
                        {{ $post->title }}
                    </h1>
                    <span
                        class="mt-5 mb-2 bg-gray-200 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                        Published {{ $post->published_at->format('d M Y') }}
                    </span>
                    @if ($post->thumbnail)
                    <img src="{{ asset('/storage/thumbnails/'.$post->thumbnail) }}" alt="image"
                        class="object-cover w-full mt-5 rounded-lg">
                    @endif
                    {{-- <img src="{{ asset('/storage/thumbnails/'.$post->thumbnail) }}" alt="image"
                        class="object-cover w-full mt-5 h-96"> --}}

                    {{-- <p class="mt-5 font-normal text-gray-700 dark:text-gray-300">{{ $post->excerpt }}</p> --}}

                    <div class="mt-6 overflow-auto prose max-w-none  @if ($post->is_featured)
                            prose-orange prose-code:text-orange-400 prose-blockquote:text-orange-400
                            @else
                            prose-indigo prose-code:text-indigo-400 prose-blockquote:text-indigo-400
                        @endif dark:prose-invert
                        ">
                        {{-- class="mt-6 overflow-auto prose max-w-none prose-gray dark:prose-invert
                        prose-a:text-indigo-400 prose-h2:text-indigo-400 prose-h3:text-indigo-400
                        prose-h4:text-indigo-400 prose-h5:text-indigo-400 prose-h6:text-indigo-400
                        prose-blockquote:text-indigo-700 prose-h1:text-indigo-400 prose-code:text-indigo-300
                        prose-pre:text-indigo-400 prose-blockquote:bg-indigo-50 prose-blockquote:border-indigo-400
                        hover:prose-a:text-indigo-500"> --}}
                        {!! $post->content !!}

                    </div>
                    <div class="flex flex-col w-full gap-5 pb-5 mt-5 mb-4">
                        <h1
                            class="text-2xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                            Recommended Posts
                        </h1>
                        @foreach ($recomendation as $post)
                        <a href="{{ route('post', $post->slug) }}" class="w-full p-4 bg-white border-2 border-gray-200 rounded-lg @if ($post->is_featured)
                            hover:border-orange-500 dark:hover:border-orange-500
                        @else
                        hover:border-indigo-500 dark:hover:border-indigo-500
                        @endif dark:bg-gray-800 dark:border-gray-700 ">

                            <div class="flex justify-between ">

                                <h5 class="font-bold tracking-tight text-gray-400 dark:text-gray-400">{{
                                    $post->category->title }}
                                </h5>
                                <span
                                    class="inline-flex items-center text-xs font-medium text-gray-400 dark:text-gray-400">
                                    <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $post->published_at->diffForHumans()}}</p>
                                </span>

                            </div>
                            <h5
                                class="mb-2 text-xl font-bold tracking-tight @if ($post->is_featured) text-gray-500  dark:text-gray-300  @else text-gray-500  dark:text-gray-300  @endif">
                                {{$post->title }}
                            </h5>
                            <p class="font-normal text-gray-600 dark:text-gray-400">
                                {{ $post->excerpt }}
                            </p>
                        </a>
                        @endforeach
                    </div>
                    <h1
                        class="text-2xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                        Comments
                    </h1>
                    <div
                        class="w-full mt-4 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">

                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <div>

                                            <span class="text-base text-sky-500 dark:text-sky-500">
                                                Username
                                                {{-- {{$guestbook->user->name }} --}}
                                            </span>
                                        </div>
                                        <div>
                                            <small class="text-sm text-gray-400 sm:ml-2 dark:text-gray-400">
                                                created at
                                                {{-- {{ $guestbook->created_at->diffForHumans() }} --}}
                                            </small>
                                            {{-- @unless ($guestbook->created_at->eq($guestbook->updated_at)) --}}
                                            {{-- @unless ($guestbook->created_at == $guestbook->updated_at) --}}
                                            <small class="text-sm text-gray-400 dark:text-gray-400"> &middot; {{
                                                __('edited')
                                                }}</small>
                                            {{-- @endunless --}}

                                            {{-- @if ($guestbook->is_pinned == true) --}}
                                            <small class="text-sm text-gray-400 dark:text-gray-400">
                                                &middot; pinned
                                            </small>
                                            {{-- @endif --}}

                                        </div>
                                    </div>

                                    {{-- @auth
                                    @if ($guestbook->user_id == Auth::id() || Auth::user()->is_admin == true) --}}
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            {{-- @if (Auth::user()->is_admin) --}}
                                            {{-- <form method="POST"
                                                action="{{ route('guestbook.unpin', $guestbook) }}">
                                                @csrf
                                                @method('patch')
                                                <x-dropdown-link :href="route('guestbook.unpin', $guestbook)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Unpin') }}
                                                </x-dropdown-link>
                                            </form> --}}
                                            {{-- @endif --}}
                                            {{-- <x-dropdown-link :href="route('guestbook.edit', $guestbook)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('guestbook.destroy', $guestbook) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('guestbook.destroy', $guestbook)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form> --}}
                                        </x-slot>
                                    </x-dropdown>
                                    {{-- @endif
                                    @endauth --}}
                                </div>
                                <p class="mt-2 text-gray-600 text-notmal dark:text-gray-400">
                                    Comment here
                                    {{-- {{$guestbook->message }} --}}
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
