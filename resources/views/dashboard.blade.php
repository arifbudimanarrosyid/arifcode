<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 ">
            <div class="text-gray-900 mb-5 dark:text-gray-100">
                You're logged in as <span class="text-indigo-400">Admin</span>!
            </div>
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
                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Featured </h5>
                    <p class="font-bold text-2xl text-indigo-700 dark:text-indigo-400">3</p>
                </div>
            </div>
            <div class="sm:flex mb-1 gap-5">
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Potrofolios</h5>
                    <p class="font-bold text-2xl text-orange-700 dark:text-orange-400">10</p>
                </div>
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">

                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Guestbooks</h5>
                    <p class="font-bold text-2xl text-lime-700 dark:text-lime-400">100</p>
                </div>
                <div class="block p-4 mb-4 bg-white  rounded-lg w-full  dark:bg-gray-800 ">
                    <h5 class="mb-2 text-xl  tracking-tight text-gray-900 dark:text-white">Users</h5>
                    <p class="font-bold text-2xl text-cyan-700 dark:text-cyan-400">69</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
