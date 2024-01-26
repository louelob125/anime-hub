<!-- resources/views/author/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Author Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl mx-auto">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                {{ $author->name }}
                            </h3>
                            <dl class="mt-5 grid grid-cols-2 gap-5 sm:grid-cols-2">
                                <img class="col-span-1 row-span-2 w-full h-full object-cover rounded-lg" src="{{ asset($author->image_url) }}" alt="Author Image">
                                <div class="col-span-1 row-span-1 p-4 border rounded-lg shadow-md">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Pseudonym
                                    </dt>
                                    <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $author->pseudonym }}
                                    </dd>
                                </div>
                                <div class="col-span-1 row-span-1 p-4 border rounded-lg shadow-md">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Ratings
                                    </dt>
                                    <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $author->ratings }}
                                    </dd>
                                </div>
                                <div class="col-span-2 row-span-1 p-4 border rounded-lg shadow-md">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                        Biography
                                    </dt>
                                    <dd class="mt-1 text-base text-gray-900 dark:text-gray-100">
                                        {{ $author->bio }}
                                    </dd>
                                </div>
                            </dl>

                            <div class="flex justify-end space-x-2 mt-4">
                                <button onclick="event.preventDefault(); location.href='{{ route('author.index', $author) }}'" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-2">
                                    Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
