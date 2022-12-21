{{-- Footer --}}
<div class="px-4 overflow-hidden sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-8 py-8 border-t-2 border-indigo-800 sm:grid-cols-4">
        <a href="{{ route('home') }}" class="font-bold dark:text-gray-200">Arif<span
                class="text-indigo-500">Code</span></a>
        <div>
            <h2 class="mb-6 font-semibold text-gray-500 underline text-md decoration-red-600 dark:text-gray-400">Website
            </h2>
            <ul class="text-gray-500 dark:text-gray-500">
                <li class="mb-4">
                    <a href="{{ route('home') }}" class=" hover:text-red-500">Home</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('gear') }}" class=" hover:text-yellow-500">Gear</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('aboutme') }}" class=" hover:text-blue-500">About Me</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 font-semibold text-gray-500 underline text-md decoration-yellow-600 dark:text-gray-400">
                Other
            </h2>
            <ul class="text-gray-500 dark:text-gray-500">
                <li class="mb-4">
                    <a href="https://github.com/arifbudimanarrosyid"
                        class="hover:text-gray-800 dark:hover:text-gray-200">Github</a>
                </li>
                <li class="mb-4">
                    <a href="https://www.youtube.com/@arifcode" class="hover:text-red-500">Youtube</a>
                </li>
                <li class="mb-4">
                    <a href="https://www.twitch.tv/arifcode" class="hover:text-indigo-300">Twitch</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 font-semibold text-gray-500 underline text-md decoration-blue-600 dark:text-gray-400">Note
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
