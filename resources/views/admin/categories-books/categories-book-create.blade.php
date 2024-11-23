<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Category to Book</h1>

        <!-- Tampilkan Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5 border border-red-300">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories-books.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            @csrf
            <!-- Pilih Book -->
            <x-forms.select-input>
                <x-slot:judul>Book</x-slot:judul>
                <x-slot:nama>book_id</x-slot:nama>
                <x-slot:options>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </x-slot:options>
            </x-forms.select-input>

            <!-- Pilih Category -->
            <x-forms.select-input>
                <x-slot:judul>Category</x-slot:judul>
                <x-slot:nama>category_id</x-slot:nama>
                <x-slot:options>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-slot:options>
            </x-forms.select-input>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
                Add Book
            </button>
        </form>
    </div>
</x-admin.layout>
