<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 ">


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
            <a href="{{ route('dashboard.category.create') }}"
                class="inline-flex items-center px-4 py-2 mr-2 mb-5  text-sm font-medium leading-4 text-gray-100 dark:text-gray-300 transition duration-150 ease-in-out bg-indigo-700  rounded-md dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                Create
            </a>


            {{-- All Category --}}
            <div>
                {{-- Category --}}
                <div class="sm:flex mb-4">

                    <div class=" w-full p-4 sm:mr-5 mb-2 bg-white flex items-center rounded-lg w-sm  dark:bg-gray-800 ">
                        <h5 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white">Laravel</h5>
                    </div>

                    <div class="sm:flex  flex-col">
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
                <div class="sm:flex mb-4">

                    <div class=" w-full p-4 sm:mr-5 mb-2 bg-white flex items-center rounded-lg w-sm  dark:bg-gray-800 ">
                        <h5 class=" text-base font-bold tracking-tight text-gray-900 dark:text-white">Tailwind CSS</h5>
                    </div>

                    <div class="sm:flex  flex-col">
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
