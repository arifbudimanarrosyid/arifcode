<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Blog --}}
            <div class="mb-5">
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
                        Published at {{ $post->published_at->format('d M Y') }}
                    </span>
                    <span
                        class="mt-5 mb-2 bg-gray-200 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                        {{ $post->views }} views
                    </span>
                    @if ($post->thumbnail)
                    <img src="{{ asset('/storage/thumbnails/'.$post->thumbnail) }}" alt="image"
                        class="object-cover w-full mt-5 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    @endif
                    {{-- <img src="{{ asset('/storage/thumbnails/'.$post->thumbnail) }}" alt="image"
                        class="object-cover w-full mt-5 h-96"> --}}

                    {{-- <p class="mt-5 font-normal text-gray-700 dark:text-gray-300">{{ $post->excerpt }}</p> --}}

                    <div class="mt-6 prose max-w-none  @if ($post->is_featured)
                            prose-orange prose-code:text-orange-400 prose-blockquote:text-orange-400
                            @else
                            prose-indigo prose-code:text-indigo-400 prose-blockquote:text-indigo-400
                        @endif dark:prose-invert prose-img:rounded-lg prose-img:border-2 dark:prose-img:border-gray-700 prose-img:border-gray-200
                        ">
                        {{-- class="mt-6 overflow-auto prose max-w-none prose-gray dark:prose-invert prose-a:text-indigo-400 prose-h2:text-indigo-400 prose-h3:text-indigo-400 prose-h4:text-indigo-400 prose-h5:text-indigo-400 prose-h6:text-indigo-400 prose-blockquote:text-indigo-700 prose-h1:text-indigo-400 prose-code:text-indigo-300 prose-pre:text-indigo-400 prose-blockquote:bg-indigo-50 prose-blockquote:border-indigo-400 hover:prose-a:text-indigo-500"> --}}
                        {!! $post->content !!}

                    </div>

                    <div class="flex flex-col w-full gap-5 pb-5 mt-5 mb-4">
                        <h1
                            class="text-2xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                            Recomendations Posts
                        </h1>
                        @forelse ($recomendations as $recomendation)
                        <a href="{{ route('post', $recomendation->slug) }}" class="w-full p-4 bg-white border-2 border-gray-200 rounded-lg
                            @if ($recomendation->is_featured)
                            hover:border-orange-500 dark:hover:border-orange-500
                            @else
                            hover:border-indigo-500 dark:hover:border-indigo-500
                            @endif dark:bg-gray-800 dark:border-gray-700 ">
                            <div class="flex flex-col justify-between sm:flex-row">
                                <h5 class="mt-2 font-bold tracking-tight text-gray-400 sm:mt-0 dark:text-gray-400">{{
                                    $recomendation->category->title }}
                                </h5>
                                <div
                                    class="flex justify-between order-first w-full sm:order-none sm:justify-end sm:w-auto">
                                    <span
                                        class="inline-flex items-center text-xs font-medium text-gray-400 dark:text-gray-400">
                                        {{-- <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd"></path>
                                        </svg> --}}
                                        <p>{{ $recomendation->published_at->diffForHumans()}}</p>
                                    </span>
                                    <p
                                        class="inline-flex items-center ml-2 text-xs font-medium text-gray-400 dark:text-gray-400">
                                        {{ $recomendation->views }} views</p>
                                </div>

                            </div>
                            <h5
                                class="mb-2 text-xl font-bold tracking-tight @if ($recomendation->is_featured) text-gray-500  dark:text-gray-300  @else text-gray-500  dark:text-gray-300  @endif">
                                {{$recomendation->title }}
                            </h5>
                            <p class="font-normal text-gray-600 dark:text-gray-400">
                                {{ $recomendation->excerpt }}
                            </p>
                        </a>
                        @empty
                        <div
                            class="mt-4 bg-white border-2 border-gray-200 divide-y-2 divide-gray-100 rounded-lg dark:border-gray-700 dark:divide-gray-700 dark:bg-gray-800">

                            <div class="flex p-4 ">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col sm:flex-row">
                                            <p class="text-base font-normal text-gray-400 dark:text-gray-400">
                                                No recomended post yet.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforelse
                    </div>


                    <div class="">
                        <h1
                            class="mb-4 text-2xl font-bold text-gray-800 underline capitalize decoration-sky-500 dark:text-white">
                            Comments
                        </h1>
                        <p class="mt-4 text-gray-600 dark:text-gray-400">
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
                            to show comment form.
                            @endauth
                        </p>

                        @auth
                        @else
                        <p class="mt-4 text-red-400 dark:text-red-300">
                            Your information is only used to display your name and comment.
                        </p>
                        @endauth

                    </div>
                    @auth
                    <form method="POST" action="{{ route('comment.store') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea id="message" rows="3" name="body"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 focus:ring-transparent dark:bg-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                            maxlength="255" placeholder="Leave a comment..." required>{{ old('body') }}</textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white rounded-lg bg-sky-700 focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                            Send
                        </button>
                    </form>
                    @endauth
                    @if (session('success'))
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
                    @endif
                    @if (session('danger'))
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
                    @endif

                    <div
                        class="mt-4 bg-white border-2 border-gray-200 divide-y-2 divide-gray-100 rounded-lg dark:border-gray-700 dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($post->comments()->orderBy('created_at', 'asc')->get() as $comment)
                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <div>
                                            @if ($comment->user_id == Auth::id())
                                            <span class="text-base text-yellow-500 dark:text-yellow-500">
                                                {{$comment->user->name }}
                                            </span>
                                            @else
                                            <span class="text-base text-sky-500 dark:text-sky-500">
                                                {{$comment->user->name }}
                                            </span>
                                            @endif
                                        </div>
                                        <div>
                                            <small class="text-sm text-gray-400 sm:ml-2 dark:text-gray-400">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                            {{-- @unless ($guestbook->created_at->eq($guestbook->updated_at)) --}}
                                            @unless ($comment->created_at == $comment->updated_at)
                                            <small class="text-sm text-gray-400 dark:text-gray-400"> &middot; {{
                                                __('edited')
                                                }}</small>
                                            @endunless
                                            @can('admin')
                                            @if ($comment->is_spam)
                                            <small class="text-sm text-gray-400 dark:text-gray-400"> &middot; <span
                                                    class="text-sm text-red-400 dark:text-red-400">reported</span></small>
                                            <small class="text-sm text-gray-400 dark:text-gray-400"> &middot; <span
                                                    class="text-sm text-red-400 dark:text-red-400">{{
                                                    $comment->spam_count }}x</span></small>
                                            @endif
                                            @endcan
                                        </div>
                                    </div>
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
                                            @auth
                                            <x-dropdown-link>
                                                {{ __('Reply (Pending Feature)') }}
                                            </x-dropdown-link>
                                            @if ($comment->user_id == Auth::id() || Auth::user()->is_admin == true)
                                            <x-dropdown-link :href="route('comment.edit', $comment)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>

                                            <form method="POST" action="{{ route('comment.destroy', $comment) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('comment.destroy', $comment)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                            @endif
                                            @endauth

                                            @if ($comment->user_id != Auth::id() )
                                            <form method="POST" action="{{ route('comments.report', $comment) }}">
                                                @csrf
                                                @method('patch')
                                                <x-dropdown-link :href="route('comments.report', $comment)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Report Spam') }}
                                                </x-dropdown-link>
                                            </form>
                                            @endif
                                            @can('admin')
                                            @if ($comment->is_spam)
                                            <form method="POST"
                                                action="{{ route('comments.remove.report', $comment) }}">
                                                @csrf
                                                @method('patch')
                                                <x-dropdown-link :href="route('comments.remove.report', $comment)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Remove Report') }}
                                                </x-dropdown-link>
                                            </form>
                                            @endif
                                            @endcan
                                        </x-slot>
                                    </x-dropdown>

                                </div>

                                <p class="mt-2 text-gray-600 text-notmal dark:text-gray-400">
                                    {{ $comment->body }}
                                </p>

                            </div>

                        </div>
                        @empty
                        <div class="flex p-4 ">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col sm:flex-row">
                                        <p class="text-base font-normal text-gray-400 dark:text-gray-400">
                                            No comment yet.
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
</x-guest-layout>
