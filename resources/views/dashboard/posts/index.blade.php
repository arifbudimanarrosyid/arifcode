<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 ">

            {{-- Info --}}
            <div class="sm:flex mb-1 gap-5">
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Total Posts</h5>
                    <p class="font-bold text-2xl text-indigo-700 dark:text-indigo-400">10</p>
                </div>
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Published</h5>
                    <p class="font-bold text-2xl text-indigo-700 dark:text-indigo-400">7</p>
                </div>
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Not Published</h5>
                    <p class="font-bold text-2xl text-indigo-700 dark:text-indigo-400">7</p>
                </div>
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">

                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Featured</h5>
                    <p class="font-bold text-2xl text-indigo-700 dark:text-indigo-400">3</p>
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
            <div>
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


            </div>
            {{-- Create --}}
            <a href="{{ route('dashboard.posts.create') }}"
                class="inline-flex items-center px-4 py-2 mr-2 mb-5  text-sm font-medium leading-4 text-gray-100 dark:text-gray-300 transition duration-150 ease-in-out bg-indigo-700  rounded-md dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                Create
            </a>


            {{-- All Posts --}}
            <div>
                {{-- Post --}}
                <div class="sm:flex mb-4">

                    <div class="block p-4 sm:mr-5 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                            <div class="flex">
                                <p class="font-normal text-gray-700 dark:text-gray-400">Published</p>
                                <p class="ml-3 font-normal  text-indigo-700 dark:text-indigo-400">Featured</p>
                            </div>
                        </div>

                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-indigo-400">Category</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>

                    <div class="sm:flex flex-col">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-green-200  rounded-md dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                            View
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-sky-200  rounded-md dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-red-200  rounded-md dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </a>

                    </div>


                </div>
                {{-- Post --}}
                <div class="sm:flex mb-4">
                    <div class="block p-4 sm:mr-5 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                            <div class="flex">
                                <p class="font-normal text-gray-700 dark:text-gray-400">Draft</p>
                                {{-- <p class="ml-3 font-normal  text-indigo-700 dark:text-indigo-400">Featured</p> --}}
                            </div>
                        </div>

                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-indigo-400">Category</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>

                    <div class="sm:flex flex-col">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-green-200  rounded-md dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                            View
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-sky-200  rounded-md dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-red-200  rounded-md dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </a>

                    </div>


                </div>
                {{-- Post --}}
                <div class="sm:flex mb-4">
                    <div class="block p-4 sm:mr-5 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                            <div class="flex">
                                <p class="font-normal text-gray-700 dark:text-gray-400">Published</p>
                                {{-- <p class="ml-3 font-normal  text-indigo-700 dark:text-indigo-400">Featured</p> --}}
                            </div>
                        </div>

                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-indigo-400">Category</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>

                    <div class="sm:flex flex-col">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-green-200  rounded-md dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                            View
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-sky-200  rounded-md dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-red-200  rounded-md dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </a>

                    </div>


                </div>
                {{-- Post --}}
                <div class="sm:flex mb-4">
                    <div class="block p-4 sm:mr-5 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                            <div class="flex">
                                <p class="font-normal text-gray-700 dark:text-gray-400">Published</p>
                                <p class="ml-3 font-normal  text-indigo-700 dark:text-indigo-400">Featured</p>
                            </div>
                        </div>

                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-indigo-400">Category</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>

                    <div class="sm:flex flex-col">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-green-200  rounded-md dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                            View
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-sky-200  rounded-md dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2  text-sm font-medium leading-4 text-gray-600 dark:text-gray-300 transition duration-150 ease-in-out bg-red-200  rounded-md dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </a>

                    </div>


                </div>
            </div>

        </div>
    </div>


</x-app-layout>
