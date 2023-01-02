<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">

            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">

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
                    <label for="default-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input name="title" type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('title') }}">
                    @error('title')
                    <p class="mt-1 text-sm text-red-500 dark:text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-800">
                    Save
                </button>
            </form>



        </div>
    </div>
</x-app-layout>
