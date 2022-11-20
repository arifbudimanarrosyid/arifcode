<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Profile --}}
            <div class="mb-5 overflow-hidden sm:flex ">
                <div class="order-last px-4 pl-0 mb-5 sm:pl-1">
                    <img src="{{ asset('img/pp.jpg') }}" alt="programming"
                        class="w-32 ml-4 rounded-full sm:px-0 sm:w-96">
                </div>
                <div class="px-4 sm:px-0">
                    <h1
                        class="mb-2 text-4xl font-bold text-gray-800 underline capitalize decoration-red-500 dark:text-white">
                        Arif Budiman Arrosyid
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    --}}
                    <h1 class="text-gray-900 dark:text-gray-100">Student | Web Developer</h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Hi, my name is Arif, I am a Web Developer,
                        currently
                        studying at Muhammadiyah University of Yogyakarta. Interested in Laravel Web Development and
                        Tailwind CSS.</h1>
                </div>

            </div>
            {{-- Featured Posts --}}
            <div class="px-4 mt-10 mb-10 overflow-x-auto sm:px-0">
                <h1
                    class="mb-6 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 dark:text-white">
                    Featured Posts
                </h1>
                {{-- <h1 class="mb-6 text-4xl font-bold text-gray-900 dark:text-gray-100">Featured Posts</h1> --}}

                <div class="flex flex-col gap-6 pb-5">
                    @foreach ($featured as $post)
                        <a href="#"
                            class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                            <div class="flex justify-between">

                                <h5 class="mb-2 font-bold tracking-tight text-indigo-500 dark:text-indigo-400">{{ $post->category->title }}</h5>
                                </h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">
                                    {{ $post->published_at->diffForHumans()}}</p>
                            </div>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->excerpt }}</p>
                        </a>
                        @endforeach
                    {{-- <a href="#"
                        class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex justify-between">

                            <h5 class="mb-2 font-bold tracking-tight text-indigo-500 dark:text-indigo-400">Category
                            </h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">4 days ago</p>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                    <a href="#"
                        class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex justify-between">

                            <h5 class="mb-2 font-bold tracking-tight text-indigo-500 dark:text-indigo-400">Category
                            </h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">4 days ago</p>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a>
                    <a href="#"
                        class="block p-4 bg-white border-2 border-gray-200 rounded-lg w-sm hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="flex justify-between">

                            <h5 class="mb-2 font-bold tracking-tight text-indigo-500 dark:text-indigo-400">Category
                            </h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">4 days ago</p>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology
                            acquisitions of 2021 so far, in reverse chronological order.</p>
                    </a> --}}


                </div>
                <a href="{{ route('posts') }}"
                    class="flex text-gray-900 hover:text-indigo-500 dark:text-gray-400 dark:hover:text-indigo-500">Read
                    all
                    posts <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 ml-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
            {{-- Tools --}}
            {{-- <div class="flex overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="mb-2 text-4xl font-bold text-gray-800 underline capitalize decoration-cyan-500 dark:text-white">
                        Tools
                    </h1>

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
            </div> --}}


        </div>
    </div>
</x-guest-layout>
