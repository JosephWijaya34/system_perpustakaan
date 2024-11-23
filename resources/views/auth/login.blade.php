<x-auth.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form name="Login" action="{{ route('validate-login') }}" method="POST" enctype="multipart/form-data"
        class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        @csrf
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h1>

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

        <div class="flex items-center justify-between mb-6">
            <label for="remember" class="flex items-center text-sm text-gray-600">
                <input type="checkbox" id="remember" name="remember"
                    class="mr-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                Remember Me
            </label>
            <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
        </div>

        <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-200">
            Login
        </button>

        <p class="text-sm text-gray-600 text-center mt-4">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign up</a>
        </p>
    </form>
</x-auth.layout>
