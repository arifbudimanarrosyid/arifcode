<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Profile --}}
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    <h1 class="mb-5 text-gray-900 dark:text-gray-100">Student | Web Developer</h1>
                    <h1 class="text-gray-600 dark:text-gray-400">Hi, my name is Arif, I am a Web Developer, currently
                        studying at Muhammadiyah University of Yogyakarta. Interested in Laravel Web Development and
                        Tailwind CSS.</h1>
                </div>
                <div class="hidden px-4 pl-10 sm:block ">
                    <img src="{{ asset('img/pp.jpg') }}" alt="programming" class="w-56 rounded-full">
                </div>
            </div>
            {{-- Featured Posts --}}
            <div class="px-4 mt-10 mb-10 overflow-x-auto sm:px-0">
                <h1 class="mb-6 text-4xl font-bold text-gray-900 dark:text-gray-100">Featured Posts</h1>

                <div class="flex flex-col gap-6 pb-5 mb-4">
                    <a href="#"
                        class="block p-4 bg-white border border-gray-200 rounded-lg w-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                    <a href="#"
                        class="block p-4 bg-white border border-gray-200 rounded-lg w-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                    <a href="#"
                        class="block p-4 bg-white border border-gray-200 rounded-lg w-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                </div>
                <a href="{{ route('blog') }}" class="flex text-gray-900 dark:text-gray-400">Read all posts <svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 ml-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
            {{-- Tools --}}
            <div class="flex overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Tools</h1>
                    <h2 class="mb-5 text-gray-600 dark:text-gray-400">This is the tools I use to build this web. </h2>
                    <ul class="max-w-full space-y-3 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <li class="font-semibold">
                            Laravel 9
                        </li>
                        <li class="font-semibold">
                            Laravel Breeze
                        </li>
                        <li class="font-semibold">
                            Tailwind CSS
                        </li>
                        <li class="font-semibold">
                            Flowbite
                        </li>
                    </ul>

                </div>
            </div>


        </div>
    </div>
</x-guest-layout>