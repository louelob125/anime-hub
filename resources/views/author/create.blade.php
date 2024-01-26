<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Author') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl mx-auto">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                            @if ($errors->any())
                                <div class="bg-red-800 text-white px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Oops! Something went wrong!</strong>
                                    <span class="block sm:inline">Please fix the following errors:</span>
                                    <ul class="mt-3 list-disc list-inside text-red-200">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('author.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Name -->
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Name') }}</label>
                                    <input id="name" name="name" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                </div>

                                <!-- Pseudonym -->
                                <div class="mb-4">
                                    <label for="pseudonym" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Pseudonym') }}</label>
                                    <input id="pseudonym" name="pseudonym" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <!-- Bio -->
                                <div class="mb-4">
                                    <label for="bio" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Bio') }}</label>
                                    <textarea id="bio" name="bio" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"></textarea>
                                </div>

                                <!-- Ratings -->
                                <div class="mb-4">
                                    <label for="ratings" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Ratings') }}</label>
                                    <input id="ratings" name="ratings" type="number" step="0.01" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <!-- Image -->
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Image') }}</label>
                                    <input id="image" name="image" type="file" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                </div>


                                <div class="flex justify-end space-x-2">
                                    <button onclick="location.href='{{ route('author.index') }}'" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-2">
                                        {{ __('Cancel') }}
                                    </button>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-2">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>