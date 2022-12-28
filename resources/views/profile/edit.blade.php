<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <div class="max-w-3xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            @if (Auth::user()->password)
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <div class="max-w-3xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <div class="max-w-3xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            @endif
            @if (Auth::user()->password == null)
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <div class="max-w-3xl">
                    @include('profile.partials.delete-user-with-no-password')
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
