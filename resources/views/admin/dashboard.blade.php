<x-admin.layout class="flex flex-col min-h-screen">
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="relative h-screen overflow-hidden animate__animated animate__fadeIn">`

        <!-- Hero Content -->
        <div class="relative flex flex-col justify-center items-center h-full text-center w-full">
            <p class="mt-4 text-6xl md:text-8xl font-satisfy text-gold text-shadow-lg">Selamat Datang Admin</p>
        </div>
    </div>
    
    {{-- Tailwind Pop-Up Alerts --}}
    @if (session('error'))
        <div id="alert-container"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg p-6 shadow-lg text-center space-y-4 max-w-md mx-auto">
                <!-- Alert Content -->
                <h2 class="text-xl font-semibold text-gray-800">Kesalahan</h2>
                <p class="text-gray-600">{{ session('error') }}</p>

                <!-- Close Button -->
                <button id="close-alert"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none">
                    OK
                </button>
            </div>
        </div>
    @elseif (session('success'))
        <div id="alert-container"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg p-6 shadow-lg text-center space-y-4 max-w-md mx-auto">
                <!-- Alert Content -->
                <h2 class="text-xl font-semibold text-gray-800">Berhasil</h2>
                <p class="text-gray-600">{{ session('success') }}</p>

                <!-- Close Button -->
                <button id="close-alert"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">
                    OK
                </button>
            </div>
        </div>
    @elseif (session('status'))
        <div id="alert-container"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg p-6 shadow-lg text-center space-y-4 max-w-md mx-auto">
                <!-- Alert Content -->
                <h2 class="text-xl font-semibold text-gray-800">Informasi</h2>
                <p class="text-gray-600">{{ session('status') }}</p>

                <!-- Close Button -->
                <button id="close-alert"
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 focus:outline-none">
                    OK
                </button>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen pop-up dan tombol
            const alertContainer = document.getElementById('alert-container');
            const closeAlert = document.getElementById('close-alert');

            // Tambahkan event listener ke tombol
            if (closeAlert && alertContainer) {
                closeAlert.addEventListener('click', function() {
                    alertContainer.style.display = 'none'; // Sembunyikan pop-up
                });
            }
        });
    </script>
</x-admin.layout>