<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <div class="flex justify-between mb-2">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-5 mr-2 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out bg-indigo-700 rounded-md dark:text-gray-300 dark:bg-indigo-800 hover:bg-indigo-800 dark:hover:bg-indigo-600 focus:outline-none">
                    Back
                </a>
                <div class="flex sm:block gap-x-2">
                    <a href="{{ route('posts.show', $posts->id) }}"
                        class="inline-flex items-center px-4 py-2 mb-5 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-green-200 rounded-md dark:text-gray-300 dark:bg-green-800 hover:bg-green-400 dark:hover:bg-green-600 focus:outline-none">
                        View
                    </a>
                    @if ($posts->thumbnail)
                    <form action="{{ route('posts.delete-thumbnail', $posts) }}" method="POST"
                        class="inline-block sm:inline-flex">
                        @csrf
                        @method('patch')
                        <button type="submit"
                            class="items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-red-200 rounded-md  sm:inline-flex dark:text-gray-300 dark:bg-red-800 hover:bg-red-400 dark:hover:bg-red-600 focus:outline-none">
                            Delete Thumbnail
                        </button>
                    </form>
                    @endif
                </div>

            </div>
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

            <form action="{{ route('posts.update', $posts->id)}}" method="POST" enctype="multipart/form-data"
                class="mb-5">
                @method('PUT')
                @csrf
                {{-- Thumbnail --}}
                <div class="mb-6">
                    @if ($posts->thumbnail)
                    <img src="{{ asset('/storage/thumbnails/'.$posts->thumbnail) }}" alt="image"
                        class="object-cover w-full mb-5 rounded-lg">
                    @endif
                    @if ($posts->thumbnail==null)
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                        Thumbnail
                    </label>
                    <input name="thumbnail"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-indigo-700 hover:file:bg-indigo-50"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> PNG,
                        JPG or JPEG up to 2MB</p>
                    @error('thumbnail')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                    @endif

                </div>


                {{-- Title --}}
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input name="title" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('title', $posts->title) }}">
                    @error('title')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug
                        (optional)</label>
                    <input name="slug" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        {{-- value="{{ old('slug', $posts->slug) }}"> --}}
                    value="{{ old('slug') }}">
                    @error('slug')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-6">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="countries" name="category_id"
                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categories as $category)
                        {{-- <option value="{{ $category->id }}">{{ $category->title }}</option> --}}
                        <option value="{{ $category->id }}" {{ old('category_id', $posts->category_id)==$category->id ?
                            'selected' : ' ' }}>
                            {{$category->title }}</option>
                        @endforeach
                        {{-- show selected category --}}
                    </select>
                    @error('category_id')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Excerpt --}}
                <div class="mb-6">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                    <textarea id="message" rows="4" name="excerpt"
                        class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your excerpt here">{{ old('excerpt', $posts->excerpt) }}</textarea>
                    @error('excerpt')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Content
                    </label>
                    <textarea id="tinymce" name="content">{{ old('content',  $posts->content) }}</textarea>
                    @error('content')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Feature --}}
                <div class="mt-6">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured</label>
                    <select id="countries" name="is_featured"
                        class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{-- <option value="1">Featured</option>
                        <option value="0">Not Featured</option> --}}
                        <option value="1" {{ old('is_featured', $posts->is_featured)==1 ? 'selected' : ' ' }}>Featured
                        </option>
                        <option value="0" {{ old('is_featured', $posts->is_featured)==0 ? 'selected' : ' ' }}>Not
                            Featured
                        </option>

                    </select>
                </div>


                {{-- Publish --}}
                <div class="mt-6">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publish</label>
                    <select id="countries" name="is_published"
                        class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{-- <option value="1">Publish</option>
                        <option value="0">Not Publish</option> --}}
                        <option value="1" {{ old('is_published', $posts->is_published)==1 ? 'selected' : ' ' }}>Publish
                        </option>
                        <option value="0" {{ old('is_published', $posts->is_published)==0 ? 'selected' : ' ' }}>Not
                            Publish
                        </option>
                    </select>
                </div>

                {{-- Published At --}}
                <div>
                    <label for="date" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">
                        Published At
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker type="datetime-local" name="published_at"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date" value="{{ old('published_at', $posts->published_at) }}">

                    </div>
                    @error('published_at')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sumbit --}}
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-800">
                    Save
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
