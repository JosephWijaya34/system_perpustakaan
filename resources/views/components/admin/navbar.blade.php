<header>
    <nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="/dashboard" class="flex items-center space-x-2 rtl:space-x-reverse">
                <span
                    class="text-2xl font-semibold text-transparent bg-clip-text bg-gradient-to-r hover:bg-gradient-to-l from-blue-500 via-blue-200 to-blue-900">Admin
                    PerpusKu</span>
            </a>

            <!-- Hamburger Button (Mobile) -->
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="md:hidden inline-flex items-center justify-center w-10 h-10 text-gray-500 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Navbar Links -->
            <div id="navbar-dropdown" class="hidden md:flex md:items-center md:space-x-8">
                <ul class="flex flex-col md:flex-row md:space-x-8">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.index') }}"
                            class="block py-2 px-4 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
                            Books
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="block py-2 px-4 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="block py-2 px-4 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
                            List User
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-red-600 hover:text-red-900">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
