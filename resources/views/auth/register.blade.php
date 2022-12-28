<x-guest-layout>
    <div class="px-4 sm:px-0">

        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </x-slot>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                        required />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation" required />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>

                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button-link class="" href="{{ route('auth.redirect.github') }}">
                        {{ __('Log In with Github') }}
                    </x-button-link>
                    <x-button-link class="ml-4" href="{{ route('auth.redirect.google') }}">
                        {{ __('Log In with Google') }}
                    </x-button-link>
                </div>
            </form>
        </x-auth-card>
    </div>

</x-guest-layout>
