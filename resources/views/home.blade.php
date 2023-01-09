<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Profile --}}
            <div class="mb-5 overflow-hidden sm:flex ">
                <div class="order-last px-4 pl-0 mb-5 sm:pl-1">
                    <img src="{{ asset('img/pp.jpg') }}" alt="ArifCode Profile Picture"
                        class="w-32 ml-4 rounded-full sm:px-0 sm:w-96">
                </div>
                <div class="px-4 sm:px-0">
                    <h1
                        class="mb-2 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 dark:text-white">
                        Arif Budiman Arrosyid
                    </h1>
                    {{-- <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-gray-100">Arif Budiman Arrosyid</h1>
                    --}}
                    <h1 class="text-gray-900 dark:text-gray-100">Student | Web Developer</h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Hi, my name is Arif, I am a Web Developer,
                        currently
                        studying at Muhammadiyah University of Yogyakarta. Interested in Laravel Web Development and
                        Tailwind CSS. You can see more about me <a href="{{ route('aboutme') }}"
                            class="text-orange-500">here</a>.</h1>
                </div>

            </div>
            {{-- Featured Posts --}}
            <div class="min-h-screen px-4 mt-10 mb-10 overflow-x-auto sm:px-0">
                <h1
                    class="mb-6 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 dark:text-white">
                    Featured Posts
                </h1>
                {{-- <h1 class="mb-6 text-4xl font-bold text-gray-900 dark:text-gray-100">Featured Posts</h1> --}}

                <div class="flex flex-col w-full gap-5 pb-5 mb-4">
                    @forelse ($featured as $post)
                    <a href="{{ route('post', $post->slug) }}"
                        class="w-full p-4 bg-white border-2 border-gray-200 rounded-lg hover:border-orange-500 dark:hover:border-orange-500 dark:bg-gray-800 dark:border-gray-700 ">

                        <div class="flex flex-col justify-between sm:flex-row ">

                            <h5 class="mt-2 font-bold tracking-tight text-gray-400 sm:mt-0 dark:text-gray-400">{{
                                $post->category->title }}
                            </h5>
                            <div class="flex justify-between order-first w-full sm:order-none sm:justify-end sm:w-auto">
                                <span
                                    class="inline-flex items-center text-xs font-medium text-gray-400 dark:text-gray-400">
                                    {{-- <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg> --}}
                                    <p>{{ $post->published_at->diffForHumans()}}</p>
                                </span>
                                <p
                                    class="inline-flex items-center ml-2 text-xs font-medium text-gray-400 dark:text-gray-400">
                                    {{ $post->views }} views</p>
                            </div>

                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-500 dark:text-gray-300">
                            {{$post->title }}
                        </h5>
                        <p class="font-normal text-gray-600 dark:text-gray-400">
                            {{ $post->excerpt }}
                        </p>
                        @if ($post->comments->count())
                        <p class="mt-2 font-normal text-gray-600 dark:text-gray-400">
                            {{ $post->comments->count() }} comments
                        </p>
                        @endif
                    </a>
                    @empty
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">No featured post yet.</h1>
                    @endforelse
                    <div class="flex">
                        <a href="{{ route('posts') }}"
                            class="flex items-center text-lg text-gray-900 hover:text-orange-500 dark:text-gray-400 dark:hover:text-orange-500">
                            Read all posts
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 ml-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <h1
                    class="mb-6 text-4xl font-bold text-gray-800 underline capitalize decoration-orange-500 dark:text-white">
                    FAQ
                </h1>
                <div
                    class="bg-white border-2 border-gray-200 divide-y-2 divide-gray-200 dark:divide-gray-700 dark:bg-gray-800 dark:border-gray-700 rounded-xl">
                    <details class="group p-6 [&_summary::-webkit-details-marker]:hidden" open>
                        <summary
                            class="flex items-center justify-between text-gray-600 cursor-pointer dark:text-gray-400">
                            <h2 class="text-lg font-medium ">
                                What is this website?
                            </h2>

                            <span class="relative ml-1.5 h-5 w-5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </summary>

                        <p class="mt-4 leading-relaxed text-gray-600 dark:text-gray-400">
                            My personal website is a place where I can share my thoughts,
                            experiences, and interests with readers. I write about a range of topics, including Laravel,
                            TailwindCSS, and AlpineJS, in order to provide information, inspiration, and entertainment
                            to my readers.
                        </p>
                    </details>
                    <details class="group p-6 [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex items-center justify-between text-gray-600 cursor-pointer dark:text-gray-400">
                            <h2 class="text-lg font-medium ">
                                What types of data do you collect from users?
                            </h2>

                            <span class="relative ml-1.5 h-5 w-5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </summary>

                        <p class="mt-4 leading-relaxed text-gray-600 dark:text-gray-400">
                            I collect some personal information from users, such as names and email addresses, which I
                            use to display your name when you post a comment or sign our guestbook.
                        </p>
                    </details>
                    <details class="group p-6 [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex items-center justify-between text-gray-600 cursor-pointer dark:text-gray-400">
                            <h2 class="text-lg font-medium ">
                                What platform or technology was used to build this website?
                            </h2>

                            <span class="relative ml-1.5 h-5 w-5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </summary>

                        <p class="mt-4 leading-relaxed text-gray-600 dark:text-gray-400">
                            This website was built using Laravel 9, TailwindCSS, AlpineJS, HyperJS, and the UI from
                            Flowbite, HyperUI. These technologies were chosen for their functionality, flexibility, and
                            user-friendliness, and have been instrumental in creating the website's features and
                            capabilities.
                        </p>
                    </details>
                </div>


            </div>
            {{-- Other --}}
            {{-- <div class="flex overflow-hidden ">
                <div class="px-4 sm:px-0">

                </div>
            </div> --}}



        </div>
    </div>
</x-guest-layout>
