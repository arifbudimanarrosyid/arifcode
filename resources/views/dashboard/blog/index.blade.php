<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 ">
            <a href="{{ route('dashboard.blog.create') }}"
                class="inline-flex items-center px-4 py-2 mr-2 mb-5  text-sm font-medium leading-4 text-gray-100 dark:text-gray-300 transition duration-150 ease-in-out bg-indigo-700  rounded-md dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                Create
            </a>
            <div class="sm:flex mb-4">
                <div class="block p-4 sm:mr-2 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                    <div class="flex justify-between mb-2">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                        <p class="font-normal text-indigo-700 dark:text-indigo-400">Featured</p>
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
            <div class="sm:flex mb-4">
                <div class="block p-4 sm:mr-2 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                    <div class="flex justify-between mb-2">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                        <p class="font-normal text-indigo-700 dark:text-indigo-400">Featured</p>
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
            <div class="sm:flex mb-4">
                <div class="block p-4 sm:mr-2 mb-2 bg-white  rounded-lg w-sm  dark:bg-gray-800 ">
                    <div class="flex justify-between mb-2">
                        <p class="font-normal text-gray-700 dark:text-gray-400">Friday, 01-04-2022</p>
                        <p class="font-normal text-indigo-700 dark:text-indigo-400">Featured</p>
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
</x-app-layout>
