<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div id="success-message" class="bg-green-800 text-white px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('anime.create') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-700 focus:outline-none">
                            Add Anime
                        </a>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($animes as $anime)
                        <div class="col-span-1">
                            <div class="p-4 border rounded-lg shadow-md">
                                <a href="{{ route('anime.show', $anime) }}">
                                    <img class="w-full h-64 object-cover rounded-t-lg" src="{{ $anime->image_url }}" alt="Card image cap">
                                </a>
                                <div class="mt-4">
                                    <h5 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $anime->english_title }}</h5>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $anime->synopsis }}</p>
                                    <div class="mt-4 flex justify-end">
                                        <a href="{{ route('anime.edit', $anime) }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-600 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none mr-2">
                                            Edit
                                        </a>
                                        <button onclick="openModal({{ $anime->id }})" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-600 rounded shadow ripple hover:shadow-lg hover:bg-red-800 focus:outline-none ml-2">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="animate-fade-in fixed z-10 inset-0 overflow-y-auto hidden font-sans" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-gray-100 dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                        Delete Anime
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Are you sure you want to delete this anime? This action cannot be undone.
                        </p>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="confirmButton" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Confirm
                    </button>
                    <button onclick="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(animeId) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('confirmButton').onclick = function() {
                deleteAnime(animeId);
            };
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function deleteAnime(animeId) {
            fetch(`/anime/${animeId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => {
                window.location.reload();
            });
        }
    </script>
</x-app-layout>
