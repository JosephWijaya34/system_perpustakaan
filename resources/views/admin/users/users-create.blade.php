<x-admin.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create User</h1>
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

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
            @csrf

            <!-- name -->
            <x-forms.normal-input>
                <x-slot:judul>Name</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>name</x-slot:nama>
                <x-slot:placeholder>Example : John Doe</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- email -->
            <x-forms.normal-input>
                <x-slot:judul>Email</x-slot:judul>
                <x-slot:type>email</x-slot:type>
                <x-slot:nama>email</x-slot:nama>
                <x-slot:placeholder>Example@gmail.com</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- password -->
            <x-forms.normal-input>
                <x-slot:judul>Password</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>password</x-slot:nama>
                <x-slot:placeholder>Admin123</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- phone -->
            <x-forms.normal-input>
                <x-slot:judul>Phone Number</x-slot:judul>
                <x-slot:type>text</x-slot:type>
                <x-slot:nama>phone</x-slot:nama>
                <x-slot:placeholder>example : 08223344556677</x-slot:placeholder>
                <x-slot:pattern>.*</x-slot:pattern>
            </x-forms.normal-input>

            <!-- Upload Foto User -->
            <x-forms.image-input>
                <x-slot:judul>Upload Foto</x-slot:judul>
                <x-slot:nama>foto</x-slot:nama>
            </x-forms.image-input>

            <!-- select role -->
            <x-forms.select-input :datas="$roles">
                <x-slot:judul>Role</x-slot:judul>
                <x-slot:nama>role_id</x-slot:nama>
            </x-forms.select-input>


            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
                Add User
            </button>
        </form>
    </div>
</x-admin.layout>
