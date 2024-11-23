<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-6">

        <!-- Flash Message -->
        @if (session('info'))
            <div class="bg-blue-100 text-blue-700 p-4 rounded-lg mb-5 border border-blue-300">
                {{ session('info') }}
            </div>
        @elseif (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5 border border-green-300">
                {{ session('success') }}
            </div>
        @endif



        <div class="flex flex-col justify-center md:flex-row md:justify-between">
            <div>
                <h1
                    class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r hover:bg-gradient-to-l from-blue-500 via-blue-200 to-blue-900 mb-4">
                    Category List</h1>
            </div>
            <!-- Tombol Tambah Buku -->
            <div class="mb-4">
                <a href="{{ route('categories.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-200 mb-4">
                    + Add Category
                </a>
            </div>
        </div>


        <!-- Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Category Name</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-left">{{ $category->category_name }}</td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-6 py-3 bg-gray-100">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-admin.layout>
