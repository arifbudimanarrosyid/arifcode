<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

</html>
