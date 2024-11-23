    <x-user.layout>
        <x-slot:title>{{ $title }}</x-slot:title>

        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-6">Daftar Buku yang Dipinjam</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5 border border-green-300">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5 border border-red-300">
                    {{ session('error') }}
            @endif

            <!-- Book List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($books as $book)
                    <div class="border border-gray-300 rounded-lg p-4 shadow-md">
                        <img src="{{ asset('storage/' . $book->foto_buku) }}" alt="{{ $book->title }}"
                            class="w-full h-40 object-cover mb-4">
                        <h2 class="text-xl font-bold mb-2">{{ $book->title }}</h2>
                        <p class="text-gray-600 mb-2">Author: {{ $book->author }}</p>
                        <p class="text-gray-600 mb-2">Publisher: {{ $book->publisher }}</p>
                        <p class="text-gray-500 text-sm">Borrowed At: {{ $book->borrowed_at }}</p>

                        <!-- Button Kembalikan -->
                        @if (is_null($book->returned_at))
                            <form action="{{ route('return.book', $book->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('POST')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700">
                                    Kembalikan
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-500">Tidak ada buku yang sedang dipinjam.</p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $books->links() }}
            </div>
        </div>
    </x-user.layout>
