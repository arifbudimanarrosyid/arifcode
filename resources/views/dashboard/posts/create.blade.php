<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 ">

            <div class="mb-5">
                {{-- Thumbnail --}}
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="file_input">Thumbnail</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold
                    file:bg-gray-200 file:text-indigo-700
                    hover:file:bg-indigo-50" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF
                        (MAX.
                        800x400px).</p>
                </div>

                {{-- Title --}}
                <div class="mb-6">
                    <x-input-label for="title" :value="__('Title')" />

                    <x-text-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" required autofocus />

                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                {{-- Slug --}}
                <div class="mb-6">
                    <x-input-label for="slug" :value="__('Slug')" />

                    <x-text-input id="slug" class="block w-full mt-1" type="text" name="slug" :value="old('slug')" required autofocus />

                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>


                <div class="mb-6">
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                    <input type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="countries"
                    class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a category</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="FR">France</option>
                    <option value="DE">Germany</option>
                </select>


                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                <textarea id="message" rows="4"
                    class="mb-6 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your excerpt here"></textarea>
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your excerpt here"></textarea>







            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-800">
                Save
            </button>



        </div>
    </div>
</x-app-layout>
