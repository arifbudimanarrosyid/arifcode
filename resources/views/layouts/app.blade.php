<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Dark Mode --}}
    {{-- <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script> --}}

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

    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
    <link rel="icon" href="{{ asset('fav.png') }}" type="image">

    {{-- Easy MDE
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script> --}}

    {{-- Trix --}}
    {{--
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Inter:wght@400;600;700&display=swap">

    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/cz2l9l1778krrir26up7x7r8ce1hvtyicthty3l0a0zu1t70/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    --}}

    {{-- TinyMCE plugins --}}
    <script>
        tinymce.init({
            mobile:{
                theme: 'mobile',
            },
            menubar: false,
            statusbar: false,
            selector:'#tinymce',
            plugins: 'fullscreen anchor resize autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker permanentpen powerpaste advtable advcode editimage  tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'fullscreen | undo redo code | blocks | h1 h2 codesample blockquote link | image bullist numlist checklist  indent outdent|bold italic underline strikethrough |  image media table mergetags |  spellcheckdialog a11ycheck typography | align lineheight |  emoticons charmap | removeformat',
            skin: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "oxide-dark" : "oxide"),
            content_css: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "")
        });
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="max-w-3xl min-h-screen mx-auto">
        @include('layouts.app-navigation')
        {{-- <div class="sm:px-6 lg:px-8">
            <div class="flex justify-end w-full px-4 sm:px-0">
                <button id="theme-toggle" type="button"
                    class="px-2 py-2 text-sm text-gray-500 bg-white rounded-lg dark:bg-gray-800 dark:text-gray-400 focus:outline-none">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div> --}}

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-gray-100 dark:bg-gray-900">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="font-sans antialiased text-gray-900">
            {{ $slot }}
            {{-- @include('layouts.guest-footer') --}}
        </main>
    </div>
</body>
{{-- <script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }

});
</script> --}}

</html>
