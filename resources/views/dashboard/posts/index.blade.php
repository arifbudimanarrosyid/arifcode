<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            {{-- Info --}}
            <div class="hidden sm:block">
                <div class="gap-5 mb-1 sm:flex">
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Posts</h5>
                        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $totalPosts }}</p>
                    </div>
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Published</h5>
                        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $publishedPosts }}</p>
                    </div>
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Draft</h5>
                        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $draftPosts }}</p>
                    </div>
                </div>
                <div class="gap-5 mb-1 sm:flex">
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Featured</h5>
                        <p class="text-2xl font-bold text-green-700 dark:text-green-400">{{ $featuredPosts }}</p>
                    </div>
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Featured & Published</h5>
                        <p class="text-2xl font-bold text-green-700 dark:text-green-400">{{ $featuredAndPublishedPosts}}
                        </p>
                    </div>
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Reported Comment</h5>
                        <p class="text-2xl font-bold text-red-700 dark:text-red-400">{{ $reportedComments }}
                        </p>
                    </div>
                </div>
            </div>
            {{--Search --}}
            <form class="flex items-center mb-5 ">
                <div class="relative w-full">
                    <input type="text" id="simple-search" name="search"
                        class="bg-white dark:bg-gray-800 text-gray-900 border-0 text-sm rounded-lg block w-full pl-4 p-2.5 focus:border-0 dark:text-white"
                        value="{{ request('search') }}" placeholder="Search by title / excerp / content">
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-1 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
            {{-- Alert --}}
            @if (session('success'))
            <div x-cloak x-show="showAlert" x-data="{ showAlert: true }"
                x-init="setTimeout(() => showAlert = false, 5000)" role="alert" class="alert">
                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
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
                <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
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


            {{-- Create --}}
            <div class="flex justify-between w-full">
                <div x-cloak x-data="{ showDropdown: false }">
                    <a href=" {{ route('posts.create') }}"
                        class="inline-flex items-center px-4 py-3 mb-5 mr-2 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-indigo-700 rounded-md dark:text-gray-300 dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                        Create
                    </a>
                    @if (Route::has('posts.deletedraftposts') && $draftPosts != 0 || $reportedComments != 0)
                    <button x-on:click=" showDropdown=!showDropdown"
                        class="items-center px-4 py-3 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-200 rounded-md dark:text-gray-300 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none">
                        Option
                    </button>
                    @endif
                    <div x-cloak x-show="showDropdown" class="flex gap-3">
                        @if (Route::has('posts.deletedraftposts') && $draftPosts != 0)
                        <form action="{{ route('posts.deletedraftposts') }}" method="POST"
                            class="inline-block sm:inline-flex">
                            @csrf
                            @method('patch')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-3 mb-5 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-red-700 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-800 dark:hover:bg-red-600 focus:outline-none">
                                Delete Draft Posts
                            </button>
                        </form>
                        @endif
                        @if ($reportedComments != 0)
                        <form action="{{ route('posts.deletereportedcomments') }}" method="POST"
                            class="inline-block sm:inline-flex">
                            @csrf
                            @method('patch')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-3 mb-5 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-red-700 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-800 dark:hover:bg-red-600 focus:outline-none">
                                Delete Reported Comments
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>


            {{-- All Posts --}}
            <div class="grid w-full gap-5 lg:grid-cols-2">
                {{-- Post --}}
                @forelse ($posts as $post)
                <div class="mb-4 sm:flex">
                    <div class="w-full p-4 mb-2 bg-white rounded-lg sm:mr-5 w-sm dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <div class="sm:flex sm:flex-row">
                                <p class="mr-2 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $post->published_at->format('d M Y') }}
                                </p>

                                <p class="font-normal text-gray-700 dark:text-gray-400">
                                    {{ $post->published_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="flex flex-col sm:flex-row ">
                                @if ($post->is_published)
                                <p class="font-normal text-right text-gray-700 dark:text-gray-400">
                                    Published
                                </p>
                                @else
                                <p class="font-normal text-right text-gray-700 dark:text-gray-400">
                                    Draft
                                </p>
                                @endif
                                @if ($post->is_featured)
                                <p class="ml-2 font-normal text-right text-indigo-700 dark:text-indigo-400">
                                    Featured
                                </p>
                                @endif
                            </div>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-indigo-600 dark:text-indigo-400">
                            {{ $post->category->title }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->excerpt }}</p>
                        <div class="flex justify-between">
                            @if ($post->comments->count() > 0)
                            <p class="mt-2 font-normal text-gray-700 dark:text-gray-400">
                                {{ $post->comments->count() }} Comment
                            </p>
                            @endif
                            @if ($post->comments->where('is_spam', 1)->count() > 0)
                            <p class="mt-2 ml-2 font-normal text-indigo-700 dark:text-indigo-400">
                                {{ $post->comments->where('is_spam', 1)->count() }} Spam
                            </p>
                            @endif
                        </div>
                    </div>
                    <div x-cloak class="flex-row sm:flex-col sm:flex" x-data="{ showModal: false }"
                        x-on:keydown.window.escape="showModal = false">
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-green-200 rounded-md dark:text-gray-300 dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                            View
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out rounded-md dark:text-gray-300 bg-sky-200 dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <button x-on:click="showModal = !showModal" x-cloak
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-red-200 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </button>
                        <div x-cloak x-show="showModal" x-transition.opacity class="fixed inset-0 backdrop-blur">
                        </div>
                        <div x-cloak x-show="showModal" x-transition
                            class="fixed inset-0 z-50 flex items-center justify-center p-5">
                            <div x-on:click.away="showModal = false"
                                class="w-screen max-w-xl mx-auto bg-white rounded-lg min-h-max dark:bg-gray-700">
                                <div class="p-5">
                                    <p class="text-base tracking-tight text-gray-900 dark:text-white">Are
                                        you sure want to delete? </p>
                                    <p class="mb-5 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $post->title }} </p>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        class="inline-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-red-200 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                                            Yes
                                        </button>
                                    </form>
                                    <button x-on:click="showModal = false"
                                        class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-200 rounded-md dark:text-gray-300 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @empty
                <h1 class="mt-4 text-gray-600 dark:text-gray-400">No Post Found</h1>
                @endforelse
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
