<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('User') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            {{-- All User --}}
            {{-- <div> --}}
                @if (session('success'))
                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                {{-- User --}}
                @foreach ($users as $user)
                <div class="mb-4 sm:flex">
                    <div class="p-4 mb-2 bg-white rounded-lg sm:w-full sm:mr-5 w-sm dark:bg-gray-800 ">
                        <div class="flex justify-between mb-2">
                            <div class="sm:flex sm:flex-row">

                                <p class="mr-2 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $user->created_at->format('d M Y') }}
                                </p>
                                <p class="font-normal text-gray-700 dark:text-gray-400">
                                    {{ $user->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="flex flex-col sm:flex-row ">
                                @if ($user->is_admin)
                                <p class="font-normal text-right text-indigo-700 dark:text-indigo-400">
                                    Admin
                                </p>
                                @else
                                <p class="font-normal text-right text-gray-700 dark:text-gray-400">
                                    User
                                </p>
                                @endif
                                {{-- @if ($user->is_featured)
                                <p class="ml-2 font-normal text-right text-indigo-700 dark:text-indigo-400">
                                    Featured
                                </p>
                                @endif --}}
                            </div>
                        </div>

                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $user->name }}</h5>
                        <h5 class="mb-2 font-bold tracking-tight text-indigo-600 dark:text-indigo-400">
                            {{ $user->email }}</h5>
                        {{-- <p class="font-normal text-gray-700 dark:text-gray-400">{{ $user->excerpt }}</p> --}}
                    </div>
                    <div class="flex-row sm:flex-col sm:flex">
                        @if ($user->is_admin)
                        <form action="{{ route('user.make-user', $user->id) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-gray-200 rounded-md dark:text-gray-300 dark:bg-gray-800 hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none">
                                Change Role
                            </button>
                        </form>
                        @else
                        <form action="{{ route('user.make-admin', $user->id) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 mb-2 text-sm font-medium leading-4 text-gray-600 transition duration-150 ease-in-out bg-indigo-200 rounded-md dark:text-gray-300 dark:bg-indigo-800 hover:bg-indigo-400 dark:hover:bg-indigo-600 focus:outline-none">
                                Change Role
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>


</x-app-layout>
