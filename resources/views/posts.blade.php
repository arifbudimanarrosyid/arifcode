<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Posts --}}
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                        Posts
                    </h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Sometimes I write what I have learned, or I will
                        write
                        whatever I like. Use the search bellow to filter by <span class="text-indigo-500">title</span> / <span class="text-indigo-500">excerpt</span> / <span class="text-indigo-500">content</span>. Featured post will
                        show <span class="text-orange-500">orange</span> border on hover.
                    </h1>
                </div>

            </div>

            {{--Search --}}
            <form class="flex items-center px-4 sm:px-0">
                {{-- <label for="simple-search" class="sr-only">Search</label> --}}
                <div class="relative w-full">
                    <input type="text" id="simple-search" name="search"
                        class="bg-gray-50 border-2 border-gray-200 text-gray-900 text-sm rounded-lg  block w-full pl-4 p-2.5  dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white focus:ring-transparent dark:focus:border-indigo-500"
                        value="{{ request('search') }}" placeholder="Search by title / excerp / content">
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-indigo-700 rounded-lg border-2 border-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>


            {{-- All Posts --}}
            <div class="flex min-h-screen my-5">
                <div class="w-full px-4 sm:px-0">
                    @if ($posts->count())
                    <div class="flex flex-col w-full gap-5 pb-5 mb-4">
                        @foreach ($posts as $post)
                        <a href="{{ route('post', $post->slug) }}" class="w-full p-4 bg-white border-2 border-gray-200 rounded-lg
                            @if ($post->is_featured)
                                hover:border-orange-500
                            @else
                            hover:border-indigo-500
                            @endif
                                 dark:bg-gray-800 dark:border-gray-700 ">

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
                                    <p>{{ $post->published_at->diffForHumans()}}</p>
                                </span>

                            </div>
                            <h5 class="mb-2 text-xl font-bold tracking-tight
                            {{-- @if ($post->is_featured) text-gray-500 hover:text-orange-500 dark:text-gray-300 dark:hover:text-orange-500 @else text-gray-500 hover:text-indigo-500 dark:text-gray-300 dark:hover:text-indigo-500 @endif --}}
                            @if ($post->is_featured) text-gray-500  dark:text-gray-300  @else text-gray-500  dark:text-gray-300  @endif
                                ">
                                {{$post->title }}
                            </h5>
                            <p class="font-normal text-gray-600 dark:text-gray-400">
                                {{ $post->excerpt }}
                            </p>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">No post found.</h1>
                    @endif
                    {{ $posts->links() }}
                </div>
            </div>


        </div>
    </div>
</x-guest-layout>
