<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">

            <div class="hidden xl:block">

                {{-- Info --}}
                <div class="gap-5 mb-1 sm:flex">
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Total Posts</h5>
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
                        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $featuredPosts }}</p>
                    </div>
                    <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                        <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Featured & Published</h5>
                        <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $featuredAndPublishedPosts
                            }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Search --}}
            <div class="mb-4">
                <form class="flex items-center ">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border-2 border-gray-200 text-gray-900 text-sm rounded-lg  block w-full pl-4 p-2.5  dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white focus:ring-transparent dark:focus:border-indigo-500"
                            placeholder="Search by title" required>
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
            </div>
            {{-- Alert --}}
            {{-- <div>
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
                        <span class="font-bold">Success alert!</span> Post created successfully.
                    </div>
                </div>


            </div> --}}
            {{-- Create --}}
            <a href="{{ route('posts.create') }}"
                class="inline-flex items-center px-4 py-2 mb-5 mr-2 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-indigo-700 rounded-md dark:text-gray-300 dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                Create
            </a>


            {{-- All Posts --}}
            <div>
                {{-- Post --}}
                @foreach ($posts as $post)
                <div class="mb-4 sm:flex">
                    <div class="block p-4 mb-2 bg-white rounded-lg sm:mr-5 w-sm dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <div class="sm:flex sm:flex-row">

                                <p class="mr-2 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $post->created_at->format('d M Y') }}
                                </p>
                                <p class="font-normal text-gray-700 dark:text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="flex">
                                <p class="font-normal text-gray-700 dark:text-gray-400">@if ($post->is_published)
                                    Published
                                    @else
                                    Draft
                                    @endif</p>
                                <p class="ml-3 font-normal text-indigo-700 dark:text-indigo-400">
                                    @if ($post->is_featured)
                                    Featured
                                    @endif
                                </p>
                            </div>
                        </div>

                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title
                            }}</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-indigo-400">{{
                            $post->category->title }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->excerpt }}</p>
                    </div>

                    <div class="flex-col sm:flex">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-green-200 rounded-md dark:text-gray-300 dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                            View
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out rounded-md dark:text-gray-300 bg-sky-200 dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-red-200 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </a>

                    </div>


                </div>
                @endforeach

                {{ $posts->links() }}


            </div>

        </div>
    </div>


</x-app-layout>