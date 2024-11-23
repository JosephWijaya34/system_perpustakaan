<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Book</h1>
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

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            @csrf

            <!-- Title -->
            <x-forms.normal-input>
                <x-slot:judul>Title</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>title</x-slot:nama>
                <x-slot:placeholder>Enter the book title</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- Author -->
            <x-forms.normal-input>
                <x-slot:judul>Author</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>author</x-slot:nama>
                <x-slot:placeholder>Enter the author's name</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- Description -->
            <x-forms.text-area-input>
                <x-slot:judul>Description</x-slot:judul>
                <x-slot:nama>description</x-slot:nama>
                <x-slot:placeholder>Enter a brief description of the book</x-slot:placeholder>
            </x-forms.text-area-input>

            <!-- Publisher -->
            <x-forms.normal-input>
                <x-slot:judul>Publisher</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>publisher</x-slot:nama>
                <x-slot:placeholder>Enter the publisher's name</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- Upload Book Cover -->
            <x-forms.image-input>
                <x-slot:judul>Upload Book Cover</x-slot:judul>
                <x-slot:nama>foto_buku</x-slot:nama>
            </x-forms.image-input>

            <!-- Checkbox category -->
            <div class="mb-5">
                <fieldset class="space-y-4">
                    <legend class="text-lg font-medium text-gray-700">Choose Category</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($categories as $category)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="category_id[]" value="{{ $category->id }}"
                                    class="h-5 w-5 text-green-500 border-gray-300 rounded focus:ring-green-300">
                                <span class="text-gray-700">
                                    {{ $category->category_name }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
                Add Book
            </button>
        </form>
    </div>
</x-admin.layout>
