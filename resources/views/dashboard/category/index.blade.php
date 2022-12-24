<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Category') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            {{-- Alert --}}
            @if (session('success'))
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

            @endif
            @if (session('danger'))
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
            @endif
            {{-- Create --}}
            <a href="{{ route('category.create') }}"
                class="inline-flex items-center px-4 py-3 mb-5 mr-2 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-indigo-700 rounded-md dark:text-gray-300 dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                Create
            </a>


            {{-- All Category --}}
            <div>
                {{-- Category --}}
                @foreach ($categories as $category)
                <div class="mb-4 sm:flex">

                    <div class="flex items-center w-full p-4 mb-2 bg-white rounded-lg sm:mr-5 w-sm dark:bg-gray-800">
                        <h5 class="text-base font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $category ->title }}
                        </h5>
                    </div>

                    <div class="flex-col sm:flex">
                        <a href="{{ route('category.edit', $category->id) }}"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out rounded-md dark:text-gray-300 bg-sky-200 dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>

                        @if (Route::has('category.destroy'))
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-red-200 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                                Delete
                            </button>

                        </form>
                        @endif

                    </div>



                </div>
                @endforeach
                {{-- <div class="mb-4 sm:flex">

                    <div class="flex items-center w-full p-4 mb-2 bg-white rounded-lg sm:mr-5 w-sm dark:bg-gray-800">
                        <h5 class="text-base font-bold tracking-tight text-gray-900 dark:text-white">Tailwind CSS</h5>
                    </div>

                    <div class="flex-col sm:flex">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out rounded-md dark:text-gray-300 bg-sky-200 dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                            Edit
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-red-200 rounded-md dark:text-gray-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete
                        </a>

                    </div>


                </div> --}}

            </div>

        </div>
    </div>


</x-app-layout>
