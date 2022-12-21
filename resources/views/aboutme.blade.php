<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Blog --}}
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-blue-500 dark:text-white">
                        About Me
                    </h1>
                </div>

            </div>
            {{-- Profile --}}
            <div class="mb-5 overflow-hidden sm:flex ">
                <div class="order-last px-4 pl-0 mb-5 sm:pl-1">
                    <img src="{{ asset('img/pp.jpg') }}" alt="programming"
                        class="w-32 ml-4 rounded-full sm:px-0 sm:w-96">
                </div>
                <div class="px-4 sm:px-0">
                    <h1
                        class="mb-2 text-3xl font-bold text-gray-800 underline capitalize decoration-orange-500 dark:text-white">
                        Arif Budiman Arrosyid
                    </h1>
                    <h1 class="text-gray-900 dark:text-gray-100">Student - Web Developer</h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Hi, my name is Arif, I am a Web Developer,
                        currently
                        studying at Muhammadiyah University of Yogyakarta. Interested in Laravel Web Development and
                        Tailwind CSS.</h1>
                </div>

            </div>
            <div class="mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">

                    <blockquote class="mb-10 text-base italic font-semibold text-gray-900 dark:text-gray-400">
                        <svg aria-hidden="true" class="w-10 h-10 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                                fill="currentColor" />
                        </svg>
                        <p>Read makes you know, Write makes you understand.</p>
                        <p> - Me</p>
                    </blockquote>


                    <h1
                        class="mb-2 text-3xl font-bold text-gray-800 underline capitalize decoration-pink-500 dark:text-white">
                        Link
                    </h1>
                    <div class="text-gray-600 dark:text-gray-400">
                        <ul class="max-w-full space-y-3 text-gray-500 list-disc list-inside dark:text-gray-400">
                            <li class="font-semibold">
                                Telegram : <a href="https://t.me/arifbudimanarrosyid"
                                    class="text-blue-400">@arifbudimanarrosyid</a>
                            </li>
                            <li class="font-semibold">
                                Instagram: <a href="https://www.instagram.com/arifbudimanarrosyid/"
                                    class="text-blue-400">arifbudimanarrosyid</a>
                            </li>
                            <li class="font-semibold">
                                Github: <a href="https://github.com/arifbudimanarrosyid"
                                    class="text-blue-400">arifbudimanarrosyid</a>
                            </li>
                            <li class="font-semibold">
                                Email: <a href="mailto:arifbudimanarrosyid@gmail.com"
                                    class="text-blue-400">arifbudimanarrosyid@gmail.com</a>
                            </li>
                            <li class="font-semibold">
                                Website: <a href="{{ route('home') }}" class="text-blue-400">arifcode.dev</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="mb-2 text-3xl font-bold text-gray-800 underline capitalize decoration-fuchsia-500 dark:text-white">
                        Inspired by
                    </h1>
                    <h1 class="text-gray-600 dark:text-gray-400">This website is inspired by <a
                            href="https://leerob.io/" class="text-blue-400">leerob.io</a> and <a
                            href="https://rizkicitra.dev/" class="text-blue-400">rizkicitra.dev</a>. Guestbook page
                        inspired by <a href="https://bootcamp.laravel.com/introduction"
                            class="text-blue-400">Chirper</a> Laravel Bootcamp.
                        Made with Laravel
                        9, Laravel Breeze, Alpine.js, Tailwind CSS, Flowbite, Heroicons, Meraki UI.
                    </h1>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
