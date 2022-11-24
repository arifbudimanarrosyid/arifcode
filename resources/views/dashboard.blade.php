<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <div class="mb-5 text-gray-900 dark:text-gray-100">
                You're logged in as <span class="text-indigo-400">
                    @if (Auth::user()->is_admin == 1)
                    Admin
                    @else
                    User
                    @endif
                </span>!
            </div>
            <div class="gap-5 mb-1 sm:flex">
                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Posts</h5>
                    <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $posts }}</p>
                </div>
                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Published</h5>
                    <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $publishedPosts }}</p>
                </div>

                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Draft</h5>
                    <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $draftPosts }}</p>
                </div>
                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Categories</h5>
                    <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-400">{{ $categories }}</p>
                </div>
            </div>
            <div class="gap-5 mb-1 sm:flex">

                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Featured</h5>
                    <p class="text-2xl font-bold text-red-700 dark:text-red-400">{{ $featuredPosts }}</p>
                </div>
                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Featured & Published</h5>
                    <p class="text-2xl font-bold text-red-700 dark:text-red-400">{{ $featuredAndPublishedPosts }}
                    </p>
                </div>
            </div>
            <div class="gap-5 mb-1 sm:flex">
                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Potrofolios</h5>
                    <p class="text-2xl font-bold text-orange-700 dark:text-orange-400">10</p>
                </div>
                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">

                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Guestbooks</h5>
                    <p class="text-2xl font-bold text-lime-700 dark:text-lime-400">{{ $guestbooks }}</p>
                </div>
                @can('admin')

                <div class="block w-full p-4 mb-4 bg-white rounded-lg dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl tracking-tight text-gray-900 dark:text-white">Users</h5>
                    <p class="text-2xl font-bold text-cyan-700 dark:text-cyan-400">{{ $users }}</p>
                </div>
                @endcan
            </div>

        </div>
    </div>
</x-app-layout>
