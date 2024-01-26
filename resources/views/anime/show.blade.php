<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $anime->english_title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                    <div class="max-w-2xl mx-auto"> <!-- Change the width here -->
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                            <div class="flex flex-col md:flex-row md:space-x-6 mb-6">
                                <!-- Image -->
                                <div class="flex-shrink-0">
                                    <img src="{{ asset($anime->image_url) }}" alt="{{ $anime->english_title }}" class="rounded-lg w-full md:w-64">
                                </div>

                                <div class="mt-4 md:mt-0">
                                    <!-- English Title -->
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100 mb-2">
                                        {{ __('English Title: ') }} {{ $anime->english_title }}
                                    </h3>

                                    <!-- Japanese Title -->
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100 mb-2">
                                        {{ __('Japanese Title: ') }} {{ $anime->japanese_title }}
                                    </h3>

                                    <!-- Genre -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Genre: ') }}</span> {{ $anime->genre->name }}
                                    </p>

                                    <!-- Type -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Type: ') }}</span> {{ $anime->type->name }}
                                    </p>

                                    <!-- Platform -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Platform: ') }}</span> {{ $anime->platform->name }}
                                    </p>

                                    <!-- Author -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Author: ') }}</span> {{ $anime->author->name }}
                                    </p>

                                    <!-- Synopsis -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Synopsis: ') }}</span> {{ $anime->synopsis }}
                                    </p>

                                    <!-- Episode Count -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Episode Count: ') }}</span> {{ $anime->episode_count }}
                                    </p>

                                    <!-- Release Date -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Release Date: ') }}</span> {{ $anime->release_date }}
                                    </p>

                                    <!-- Ratings -->
                                    <p class="text-gray-700 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ __('Ratings: ') }}</span> {{ $anime->ratings }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-5 flex justify-end">
                                <button onclick="location.href='{{ route('anime.index') }}'" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-2">
                                    {{ __('Back') }}
                                </button>

                                <button onclick="location.href='{{ route('anime.edit', $anime) }}'" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 transition ease-in-out duration-150 mr-2 text-white font-semibold text-xs uppercase tracking-widest rounded-md">
                                    {{ __('Edit') }}
                                </button>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
