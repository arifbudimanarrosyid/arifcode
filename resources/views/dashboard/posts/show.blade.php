<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Show Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <div class="mb-4 overflow-hidden">
                <div class="flex justify-between mb-2">
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex items-center px-4 py-2 mb-5 mr-2 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-indigo-700 rounded-md dark:text-gray-300 dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                        Back
                    </a>
                    <a href="{{ route('posts.edit', $posts->id) }}"
                        class="inline-flex items-center px-4 py-2 mb-5 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out rounded-md dark:text-gray-300 bg-sky-200 dark:bg-sky-800 hover:bg-sky-400 dark:hover:bg-sky-600 focus:outline-none">
                        Edit
                    </a>
                </div>
                <h5 class="mb-2 font-bold tracking-tight text-indigo-500 dark:text-indigo-400">
                    {{$posts->category->title }}
                </h5>
                <h1 class="text-4xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                    {{ $posts->title }}
                </h1>

                @if ($posts->is_published == 1)
                <span
                    class="mt-5 mb-2 bg-gray-200 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                    Published {{ $posts->published_at->format('d M Y') }}
                </span>
                @else
                <span
                    class="mt-5 mb-2 bg-gray-200 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                    Draft
                </span>
                @endif

                @if ($posts->thumbnail)
                <img src="{{ asset('/storage/thumbnails/'.$posts->thumbnail) }}" alt="image"
                    class="object-cover w-full mt-5 rounded-lg">
                @endif
                {{-- <img src="{{ asset('/storage/thumbnails/'.$posts->thumbnail) }}" alt="image"
                    class="object-cover w-full mt-5 h-96"> --}}

                <p class="mt-5 font-normal text-gray-700 dark:text-gray-300">{{ $posts->excerpt }}</p>

                <div
                    class="mt-6 overflow-auto prose max-w-none prose-indigo dark:prose-invert
                    prose-code:text-indigo-400 prose-blockquote:text-indigo-400">

                    {{-- class="mt-6 overflow-auto prose max-w-none prose-gray dark:prose-invert prose-a:text-indigo-400 prose-h2:text-indigo-400 prose-blockquote:text-indigo-700 prose-code:text-indigo-300 prose-pre:text-indigo-400 prose-blockquote:bg-indigo-50 prose-blockquote:border-indigo-400 hover:prose-a:text-indigo-500"> --}}
                    {!! $posts->content !!}

                </div>
                {{-- <div class="flex flex-col w-full gap-5 pb-5 mt-5 mb-4">
                    <h1
                        class="text-2xl font-bold text-gray-800 underline capitalize decoration-indigo-500 dark:text-white">
                        Recommended Posts
                    </h1>
                    @foreach ($recomendation as $recomend)
                    <a href="{{ route('post', $recomend->slug) }}"
                        class="w-full p-4 bg-white border-2 border-gray-200 rounded-lg hover:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 ">

                        <div class="flex justify-between">

                            <h5 class="mb-2 font-bold tracking-tight text-indigo-500 dark:text-indigo-400">{{
                                $recomend->category->title }}
                            </h5>
                            <span class="inline-flex items-center text-xs font-medium text-gray-800 dark:text-gray-300">
                                <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $recomend->published_at->diffForHumans()}}</p>
                            </span>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{$recomend->title }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            {{ $recomend->excerpt }}
                        </p>
                    </a>
                    @endforeach
                </div> --}}

            </div>



        </div>
    </div>
</x-app-layout>
