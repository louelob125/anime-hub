<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div id="success-message" class="bg-green-800 text-white px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="p-6 text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('author.create') }}" class="inline-block px-6 py-2 text-base font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-700 focus:outline-none">
                            Add Author
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Ratings
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            @foreach ($authors as $author)
                                <tr id="author-{{ $author->id }}" class="hover:bg-gray-700">
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $author->id }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $author->name }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $author->ratings }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                        <button onclick="location.href='{{ route('author.show', $author) }}'" class="inline-flex items-center px-2 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            View
                                        </button>
                                        <button onclick="location.href='{{ route('author.edit', $author) }}'" class="inline-flex items-center px-2 py-1 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Edit
                                        </button>
                                        <button onclick="openModal({{ $author->id }})" class="inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 flex justify-end">
                        <button onclick="location.href='{{ route('admin.index') }}'" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-2">
                            {{ __('Back') }}
                        </button>
                    </div>

                    <script>
                        window.onload = function() {
                            const urlParams = new URLSearchParams(window.location.search);
                            const highlight = urlParams.get('highlight');
                            let row;
                            if (highlight) {
                                row = document.getElementById('author-' + highlight);
                                if (row) {
                                    row.style.backgroundColor = '#1E90FF'; 
                                }
                            }
                            
                            setTimeout(function() {
                                const element = document.getElementById('success-message');
                                if (element) {
                                    element.style.display = 'none';
                                }

                                if (row) {
                                    row.style.backgroundColor = '';  
                                }
                            }, 3000);

                            if (highlight) {
                                urlParams.delete('highlight');
                                history.replaceState({}, '', `${location.pathname}?${urlParams}`);
                            }
                        }
                    </script>
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
                        Delete Author
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Are you sure you want to delete this author? This action cannot be undone.
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
        function openModal(authorId) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('confirmButton').onclick = function() {
                deleteAnime(authorId);
            };
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function deleteAnime(authorId) {
            fetch(`/author/${authorId}`, {
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

