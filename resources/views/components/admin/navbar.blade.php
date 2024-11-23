<header>
    <nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" alt="Flowbite Logo" class="h-8" />
                <span class="text-2xl font-semibold dark:text-white">Flowbite</span>
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
                    <!-- Home Link -->
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-blue-700 bg-blue-100 rounded md:bg-transparent md:text-blue-700 dark:text-blue-500 dark:bg-transparent">
                            Home
                        </a>
                    </li>

                    <!-- Dropdown -->
                    <li class="relative group">
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center py-2 px-4 text-gray-900 dark:text-white hover:text-blue-700 dark:hover:text-blue-500">
                            Dropdown
                            <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l5 5 5-5" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="dropdownNavbar"
                            class="absolute left-0 mt-2 hidden w-44 bg-white rounded-lg shadow-md dark:bg-gray-700 group-hover:block">
                            <ul class="py-2">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                        Earnings
                                    </a>
                                </li>
                            </ul>
                            <div class="border-t border-gray-100 dark:border-gray-600">
                                <a href="#"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                    Sign out
                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- Services -->
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
                            Services
                        </a>
                    </li>

                    <!-- Pricing -->
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
                            Pricing
                        </a>
                    </li>

                    <!-- Logout -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
