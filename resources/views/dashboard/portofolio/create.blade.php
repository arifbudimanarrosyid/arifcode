<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">

            <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">

                @csrf
                {{-- <div class="mb-5">


                    <div class="mb-6">
                        <x-input-label for="title" :value="__('Title')" />

                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title')" required autofocus />

                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                </div> --}}
                <div class="mb-6">
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
                </div>
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input name="title" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('title') }}">
                    @error('title')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="message" rows="4" name="description"
                        class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your description here">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technology</label>
                    <input name="technology" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('technology') }}">
                    @error('technology')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Demo Link</label>
                    <input name="demo_link" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('demo_link') }}">
                    @error('demo_link')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Github Link</label>
                    <input name="github_link" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('github_link') }}">
                    @error('github_link')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website Link</label>
                    <input name="website_link" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('website_link') }}">
                    @error('website_link')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Youtube Link</label>
                    <input name="youtube_link" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('youtube_link') }}">
                    @error('youtube_link')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deployed</label>
                    <select id="countries" name="is_deployed"
                        class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1">Deployed</option>
                        <option value="0">Not Deploy</option>
                    </select>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-800">
                    Save
                </button>
            </form>



        </div>
    </div>
</x-app-layout>
