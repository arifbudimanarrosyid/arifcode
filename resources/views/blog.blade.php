<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Blog --}}
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-green-500 dark:text-white">
                        Blog
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Blog</h1> --}}
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Sometimes I write what I have learned, or I will
                        write
                        whatever I like. Use the search bellw to filter by title.</h1>

                </div>

            </div>

            {{--Search --}}
            <form class="flex items-center px-4 sm:px-0">
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


            {{-- All Posts --}}
            <div class="flex my-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="mb-6 text-3xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                        All Posts
                    </h1>
                    {{-- <h1 class="mb-6 text-2xl font-bold text-gray-900 dark:text-gray-100">All Posts</h1> --}}
                    <div class="flex flex-col gap-6 pb-5 mb-4">

                        <a href="#"
                            class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                                technology acquisitions 2021</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology
                                acquisitions of 2021 so far, in reverse chronological order.</p>
                        </a>
                        <a href="#"
                            class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                                technology acquisitions 2021</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology
                                acquisitions of 2021 so far, in reverse chronological order.</p>
                        </a>
                        <a href="#"
                            class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                                technology acquisitions 2021</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology
                                acquisitions of 2021 so far, in reverse chronological order.</p>
                        </a>
                        <a href="#"
                            class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                                technology acquisitions 2021</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology
                                acquisitions of 2021 so far, in reverse chronological order.</p>
                        </a>

                    </div>




                </div>

            </div>


        </div>
    </div>
</x-guest-layout>
