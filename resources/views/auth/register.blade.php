<x-auth.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form name="Register" action="{{ route('validate-register') }}" method="POST" enctype="multipart/form-data"
        class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        @csrf
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Register</h1>

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

        <!-- Menggunakan Komponen normal-input untuk Name -->
        <x-forms.normal-input>
            <x-slot:judul>Full Name</x-slot:judul>
            <x-slot:type>text</x-slot:type>
            <x-slot:nama>name</x-slot:nama>
            <x-slot:placeholder>Enter your full name</x-slot:placeholder>
            <x-slot:pattern>.*</x-slot:pattern>
        </x-forms.normal-input>

        <!-- Menggunakan Komponen normal-input untuk Email -->
        <x-forms.normal-input>
            <x-slot:judul>Email Address</x-slot:judul>
            <x-slot:type>email</x-slot:type>
            <x-slot:nama>email</x-slot:nama>
            <x-slot:placeholder>Enter your email</x-slot:placeholder>
            <x-slot:pattern>.*</x-slot:pattern>
        </x-forms.normal-input>

        <!-- Menggunakan Komponen normal-input untuk Password -->
        <x-forms.normal-input>
            <x-slot:judul>Password</x-slot:judul>
            <x-slot:type>password</x-slot:type>
            <x-slot:nama>password</x-slot:nama>
            <x-slot:placeholder>Enter your password</x-slot:placeholder>
            <x-slot:pattern>.*</x-slot:pattern>
        </x-forms.normal-input>

        <!-- Menggunakan Komponen image-input untuk Foto -->
        <x-forms.image-input>
            <x-slot:judul>Upload Profile Picture</x-slot:judul>
            <x-slot:nama>foto</x-slot:nama>
        </x-forms.image-input>

        <!-- Hidden role_id -->
        <input type="hidden" name="role_id" value="2">

        <button type="submit"
            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
            Register
        </button>

        <p class="text-sm text-gray-600 text-center mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-green-500 hover:underline">Login</a>
        </p>
    </form>
</x-auth.layout>
