<x-user.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Book Catalogue</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5 border border-green-300">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5 border border-red-300">
                {{ session('error') }}
        @endif

        <!-- Filter Form -->
        <form method="GET" action="{{ route('catalogue') }}" class="mb-6 flex space-x-4">
            <!-- Filter by Title -->
            <input type="text" name="title" value="{{ request('title') }}"
                class="px-4 py-2 border border-gray-300 rounded-lg" placeholder="Search by title...">

            <!-- Filter by Category -->
            <select name="category_id" class="px-4 py-2 border border-gray-300 rounded-lg">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </form>

        <!-- Book List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($books as $book)
                <div class="border border-gray-300 rounded-lg p-4 shadow-md">
                    <img src="{{ asset('storage/' . $book->foto_buku) }}" alt="{{ $book->title }}"
                        class="w-full h-40 object-cover mb-4">
                    <h2 class="text-xl font-bold mb-2">{{ $book->title }}</h2>
                    <p class="text-gray-600 mb-2">Author: {{ $book->author }}</p>
                    <p class="text-gray-600 mb-2">Publisher: {{ $book->publisher }}</p>
                    <p class="text-gray-500 text-sm">Categories:
                        @foreach ($book->categories as $category)
                            <span
                                class="text-blue-500">{{ $category->category_name }}</span>{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </p>
                    <!-- Button Pinjam -->
                    @auth
                        @if (Auth::user()->role_id == 2)
                            <form action="{{ route('borrow.book', $book->id) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">
                                    Pinjam
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">No books found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $books->links() }}
        </div>
    </div>
</x-user.layout>
