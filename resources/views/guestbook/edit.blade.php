<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex mb-5 overflow-hidden ">
                <div class="px-4 sm:px-0">
                    <h1
                        class="text-4xl font-bold text-gray-800 underline capitalize decoration-sky-500 dark:text-white">
                        Edit Guestbook
                    </h1>
                    <h1 class="mt-4 text-gray-600 dark:text-gray-400">Hope you like the website, please leave a message.
                        You need to login.
                    </h1>

                </div>

            </div>
            <div class="flex my-5 ">
                <div class="w-full px-4 sm:px-0">
                    <div class="w-full ">

                        <form method="POST" action="{{ route('guestbook.update', $guestbook) }}">
                            @csrf
                            @method('patch')
                            {{-- <textarea name="message"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('message', $guestbook->message) }}</textarea>
                            --}}
                            <textarea id="message" rows="3" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 focus:ring-transparent dark:bg-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent "
                                maxlength="255" placeholder="Leave a message...">{{ old('message', $guestbook->message) }}</textarea>
                            {{-- <textarea id="message" rows="4" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-transparent focus:ring-transparent dark:bg-gray-800 dark:border-transparent dark:placeholder-gray-400 dark:text-white dark:focus:ring-transparent"
                                placeholder="Leave a message...">{{ old('message', $guestbook->message) }}</textarea> --}}

                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white rounded-lg bg-sky-700 focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                Send
                            </button>

                        </form>

                    </div>
                </div>
            </div>



        </div>
    </div>
</x-guest-layout>
