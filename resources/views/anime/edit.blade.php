<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Anime') }}
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

                            <form method="POST" action="{{ route('anime.update', $anime) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- English Title -->
                                <div class="mb-4">
                                    <label for="english_title" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('English Title') }}</label>
                                    <input id="english_title" name="english_title" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" value="{{ $anime->english_title }}" required>
                                </div>

                                <!-- Japanese Title -->
                                <div class="mb-4">
                                    <label for="japanese_title" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Japanese Title') }}</label>
                                    <input id="japanese_title" name="japanese_title" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" value="{{ $anime->japanese_title }}" required>
                                </div>

                                <!-- Author -->
                                <div class="mb-4">
                                    <label for="author_id" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Author') }}</label>
                                    <select id="author_id" name="author_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}" {{ $anime->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Genre -->
                                <div class="mb-4">
                                    <label for="genre_id" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Genre') }}</label>
                                    <select id="genre_id" name="genre_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}" {{ $anime->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Type -->
                                <div class="mb-4">
                                    <label for="type_id" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Type') }}</label>
                                    <select id="type_id" name="type_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ $anime->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Platform -->
                                <div class="mb-4">
                                    <label for="platform_id" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Platform') }}</label>
                                    <select id="platform_id" name="platform_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}" {{ $anime->platform_id == $platform->id ? 'selected' : '' }}>{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Collection -->
                                <div class="mb-4">
                                    <label for="collection_id" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Collection') }}</label>
                                    <select id="collection_id" name="collection_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                        @foreach ($collections as $collection)
                                            <option value="{{ $collection->id }}" {{ $anime->collection_id == $collection->id ? 'selected' : '' }}>{{ $collection->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Ratings -->
                                <div class="mb-4">
                                    <label for="ratings" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Ratings') }}</label>
                                    <input id="ratings" name="ratings" type="number" step="0.1" min="0" max="10" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" value="{{ $anime->ratings }}" required>
                                </div>

                                <!-- Synopsis -->
                                <div class="mb-4">
                                    <label for="synopsis" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Synopsis') }}</label>
                                    <textarea id="synopsis" name="synopsis" rows="4" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>{{ $anime->synopsis }}</textarea>
                                </div>

                                <!-- Episode Count -->
                                <div class="mb-4">
                                    <label for="episode_count" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Episode Count') }}</label>
                                    <input id="episode_count" name="episode_count" type="number" min="0" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" value="{{ $anime->episode_count }}" required>
                                </div>

                                <!-- Release Date -->
                                <div class="mb-4">
                                    <label for="release_date" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Release Date') }}</label>
                                    <input id="release_date" name="release_date" type="date" value="{{ $anime->release_date }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                                </div>

                                <!-- Image -->
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Image') }}</label>
                                    <input id="image" name="image" type="file" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                </div>

                                <div class="flex justify-end space-x-2">
                                    <button onclick="event.preventDefault(); location.href='{{ route('anime.index') }}'" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-2">
                                        {{ __('Cancel') }}
                                    </button>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-2">
                                        {{ __('Update') }}
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
