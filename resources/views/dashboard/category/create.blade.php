<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">

            <div class="mb-5">


                {{-- Title --}}
                <div class="mb-6">
                    <x-input-label for="title" :value="__('Title')" />

                    <x-text-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" required autofocus />

                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-900 hover:bg-indigo-800">
                Save
            </button>



        </div>
    </div>
</x-app-layout>
