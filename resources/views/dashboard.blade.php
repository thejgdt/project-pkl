<x-app-layout>
    <div x-data="{ content: 'Overview' }" class="flex pt-16 overflow-hidden bg-gray-100 dark:bg-gray-900">

        <x-sidebar>
            <li>
                <button href="https://flowbite-admin-dashboard.vercel.app/"
                    class="flex items-center w-full p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Overview</span>
                </button>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="dropdown-crud" @click="openCrud = !openCrud">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M.99 5.24A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25l.01 9.5A2.25 2.25 0 0116.76 17H3.26A2.267 2.267 0 011 14.74l-.01-9.5zm8.26 9.52v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.615c0 .414.336.75.75.75h5.373a.75.75 0 00.627-.74zm1.5 0a.75.75 0 00.627.74h5.373a.75.75 0 00.75-.75v-.615a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625zm6.75-3.63v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75zM17.5 7.5v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">CRUD</span>
                    <svg :class="{ 'rotate-180': openCrud }" class="w-6 h-6 transform transition-transform"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul x-show="openCrud" id="dropdown-crud" class="space-y-2 py-2" style="display: none;"
                    x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                    <li>
                        <button href="https://flowbite-admin-dashboard.vercel.app/crud/products/"
                            class="text-base text-gray-900 rounded-lg flex items-center w-full p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Products</button>
                    </li>
                    <li>
                        <button href="https://flowbite-admin-dashboard.vercel.app/crud/users/"
                            class="text-base text-gray-900 rounded-lg flex items-center w-full p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Users</button>
                    </li>
                </ul>
            </li>
        </x-sidebar>

        <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-[17rem]">
            <div class="pt-5 flex flex-col">
                <div
                    class="lg:fixed lg:left-[17rem] lg:right-0 border border-gray-300 dark:border-gray-600 p-4 mx-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </div>
            <!-- Content Wrapper -->
            <div class="flex-1 flex flex-col lg:mt-20 xl:mt-24">
                <div class="flex-1 p-4 h-full">
                    <template x-if="content === 'Overview'">
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-4">
                            @foreach ($tableData as $tableName => $total)
                                <div
                                    class="flex flex-col justify-between h-full border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800">
                                    <div class="px-6 py-4 flex-grow">
                                        <div class="flex justify-between">
                                            <div>
                                                <!-- Title -->
                                                <div class="font-bold text-xl text-gray-900 dark:text-gray-100">
                                                    {{ $tableName }}
                                                </div>
                                                <!-- Subtitle -->
                                                <p class="text-gray-700 mb-4 dark:text-gray-400 text-base">
                                                    {{ __('Jumlah data dalam tabel ' . $tableName) }}
                                                </p>
                                            </div>
                                            <h3 class="text-sky-400 font-bold text-xl">
                                                {{ $total }}
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- Bottom Bar -->
                                    <div class="px-6 py-4">
                                        <x-primary-button
                                            class="w-full justify-center">{{ __('VIEW TABLE') }}</x-primary-button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
