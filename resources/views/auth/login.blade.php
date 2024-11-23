<x-auth.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form name="Login" action="{{ route('validate-login') }}" method="POST" enctype="multipart/form-data"
        class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        @csrf
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5 border border-green-300">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

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

        <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
            Login
        </button>

        <p class="text-sm text-gray-600 text-center mt-4">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign up</a>
        </p>
    </form>
</x-auth.layout>
