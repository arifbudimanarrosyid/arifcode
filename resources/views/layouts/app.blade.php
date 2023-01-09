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
    <script src="https://cdn.tiny.cloud/1/cz2l9l1778krrir26up7x7r8ce1hvtyicthty3l0a0zu1t70/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    --}}

    {{-- TinyMCE plugins --}}
    <script>
        tinymce.init({
            menubar: false,
            statusbar: false,
            selector:'#tinymce',
            min_height: 1000,

            plugins: 'paste code fullscreen anchor resize autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'fullscreen code | blocks h1 h2 h3 codesample blockquote link  align | image bullist numlist checklist  indent outdent|bold italic underline strikethrough |  image media table mergetags |  spellcheckdialog a11ycheck typography |  lineheight |  emoticons charmap | removeformat',
            skin: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "oxide-dark" : "oxide"),
            content_css: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : ""),

            // image_title: true,
            automatic_uploads: true,
            images_upload_url: '/uploads',
            file_picker_types: 'image',
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route('uploads') }}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-TOKEN", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
            // file_picker_callback: function(cb, value, meta) {
            //     var input = document.createElement('input');
            //     input.setAttribute('type', 'file');
            //     input.setAttribute('accept', 'image/*');
            //     input.onchange = function() {
            //         var file = this.files[0];

            //         var reader = new FileReader();
            //         reader.readAsDataURL(file);
            //         reader.onload = function () {
            //             var id = 'blobid' + (new Date()).getTime();
            //             var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            //             var base64 = reader.result.split(',')[1];
            //             var blobInfo = blobCache.create(id, file, base64);
            //             blobCache.add(blobInfo);
            //             cb(blobInfo.blobUri(), { title: file.name });
            //         };
            //     };
            //     input.click();
            // }
        });

    </script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

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
