<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Posts --}}
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                        Portofolios
                    </h1>
                    {{-- <h1 class="mt-4 text-gray-600 dark:text-gray-400">This is my portofolio.
                    </h1> --}}
                </div>

            </div>




            {{-- All Posts --}}
            <div class="flex min-h-screen my-5">
                <div class="w-full px-4 sm:px-0">
                    @if ($portofolios->count())
                    <div class="flex flex-col w-full gap-5 pb-5 mb-4">
                        @foreach ($portofolios as $portofolio)
                        <div
                            class="w-full p-4 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                            @if ($portofolio->thumbnail)
                            <img src="{{ asset('/storage/portofolio/'.$portofolio->thumbnail) }}" alt="image"
                                class="object-cover w-full mb-5 border-2 border-gray-200 rounded-lg aspect-video dark:border-gray-700">
                            @endif
                            <div class="w-full mb-4">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-500 dark:text-gray-300 ">
                                    {{$portofolio->title }}
                                </h5>
                                <h5 class="mt-2 font-bold tracking-tight text-gray-400 sm:mt-0 dark:text-gray-400">
                                    {{ $portofolio->technology }}
                                </h5>
                                <p class="mt-2 font-normal text-gray-600 dark:text-gray-400">
                                    {{ $portofolio->description }}
                                </p>

                            </div>
                            <div class="">
                                @if ($portofolio->demo_link)
                                <a href="{{ $portofolio->demo_link }}" target="_blank"
                                    class="inline-flex items-center px-3 py-2 mb-2 mr-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                                    Demo
                                </a>
                                @endif
                                @if ($portofolio->github_link)
                                <a href="{{ $portofolio->github_link }}" target="_blank"
                                    class="inline-flex items-center px-3 py-2 mb-2 mr-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                                    Github
                                </a>

                                @endif
                                @if ($portofolio->website_link)
                                <a href="{{ $portofolio->website_link }}" target="_blank"
                                    class="inline-flex items-center px-3 py-2 mb-2 mr-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                                    Website
                                </a>
                                @endif
                                @if ($portofolio->youtube_link)
                                <a href="{{ $portofolio->youtube_link }}" target="_blank"
                                    class="inline-flex items-center px-3 py-2 mb-2 mr-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-100 border border-transparent rounded-md dark:text-gray-300 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                                    Youtube
                                </a>
                                @endif
                            </div>

                        </div>

                        @endforeach
                    </div>
                    @else
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">No post found.</h1>
                    @endif
                </div>
            </div>


        </div>
    </div>
</x-guest-layout>
