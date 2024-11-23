<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Category</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            @csrf
            @method('PUT')

            <!-- category name -->
            <x-forms.normal-input>
                <x-slot:judul>Category Name</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>category_name</x-slot:nama>
                <x-slot:value>{{ $category->category_name }}</x-slot:value>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
                Add Category
            </button>
        </form>
    </div>
</x-admin.layout>