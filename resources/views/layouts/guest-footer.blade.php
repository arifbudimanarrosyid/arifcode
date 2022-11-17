{{-- Footer --}}
<div class="px-4 overflow-hidden sm:px-9">

    <div class="grid grid-cols-3 gap-8 py-8 ">
        <div>
            <h2 class="mb-6 font-semibold text-gray-500 underline text-md decoration-red-600 dark:text-gray-400">Website
            </h2>
            <ul class="text-gray-500 dark:text-gray-500">
                <li class="mb-4">
                    <a href="{{ route('home') }}" class=" hover:text-indigo-500">Home</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('gear') }}" class=" hover:text-indigo-500">Gear</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('aboutme') }}" class=" hover:text-indigo-500">About Me</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 font-semibold text-gray-500 underline text-md decoration-yellow-600 dark:text-gray-400">Social Media
            </h2>
            <ul class="text-gray-500 dark:text-gray-500">
                <li class="mb-4">
                    <a href="#" class="hover:text-indigo-500">Github</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:text-indigo-500">Youtube</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:text-indigo-500">Twitch</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 font-semibold text-gray-500 underline text-md decoration-blue-600 dark:text-gray-400">Other
            </h2>
            <ul class="text-gray-500 dark:text-gray-500 ">
                <li class="mb-4">
                    <a href="https://github.com/arifbudimanarrosyid/Obsidian" target="_blank"
                        class="hover:text-indigo-500">Obsidian</a>
                </li>

            </ul>
        </div>
    </div>
</div>
