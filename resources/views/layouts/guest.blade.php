<!DOCTYPE html>
<html x-cloak lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{darkMode: localStorage.getItem('darkMode')|| localStorage.setItem('darkMode', 'system')}"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="ArifCode, personal website, blog and online portofolio by Arif Budiman Arrosyid, Built with Laravel, Tailwind CSS and Flowbite Component.">
    <meta property="og:title" content=ArifCode - Personal Website>
    <meta property="og:site_name" content=ArifCode>
    <meta property="og:url" content=arifcode.dev>
    <meta property="og:description" content=ArifCode, personal website, blog and online portofolio by Arif Budiman
        Arrosyid, Built with Laravel, Tailwind CSS and Flowbite Component.>
    <meta property="og:type" content=website>
    <meta property="og:image" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('fav.png') }}" type="image">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Inter:wght@400;600;700&display=swap">
    <style>
        [x-cloak] {
            display: none !important;
        }

        @media (prefers-color-scheme: dark) {
            ::-webkit-scrollbar {
                width: 5px;
                background-color: #111827;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #4f46e5;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background-color: #6366d0;
            }
        }

        @media (prefers-color-scheme: light) {
            ::-webkit-scrollbar {
                width: 10px;
                height: 10px;
                background-color: #f5f5f5;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #4f46e5;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background-color: #6366d0;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    @if (Route::currentRouteName() == 'home')
    <div class="hidden text-gray-500 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 md:block">
        <div class="flex flex-col items-center justify-center max-w-3xl p-3 mx-auto text-sm" role="alert">
            <p class="text-center">If you're a first-time visitor to my website, I invite you to leave your mark by
                signing my <a href="{{ route("guestbook.index") }}"
                    class="text-orange-400 dark:text-orange-500">guestbook</a>.
            <p>I appreciate your feedback and thoughts,
                and hope that you enjoy your visit to my
                website.</p>
            </p>
        </div>
    </div>
    @endif
    <div class="max-w-3xl min-h-screen mx-auto">
        @include('layouts.guest-navigation')
        <div class="font-sans antialiased text-gray-900">
            {{ $slot }}
            @include('layouts.guest-footer')
        </div>
    </div>
</body>

</html>
