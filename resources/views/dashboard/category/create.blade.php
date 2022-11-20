<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 ">

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
