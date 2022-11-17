<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Blog --}}
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-green-500 dark:text-white">
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
                    <h1 class="text-gray-900 dark:text-gray-100">Student | Web Developer</h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Hi, my name is Arif, I am a Web Developer,
                        currently
                        studying at Muhammadiyah University of Yogyakarta. Interested in Laravel Web Development and
                        Tailwind CSS.</h1>
                </div>
            </div>
            <div class="mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
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
                            href="https://rizkicitra.dev/" class="text-blue-400">rizkicitra.dev</a>. Made with Laravel
                        9, Laravel Breeze, Alpine.js, Tailwind CSS.</h1>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
