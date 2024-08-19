<x-app-layout>
    <div x-data="{ content: 'Overview', openCrud: false }" class="flex pt-16 overflow-hidden bg-gray-100 dark:bg-gray-900">

        <x-sidebar>
            <li>
                <button @click="content = 'Overview'"
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
                        <button @click.prevent="content = 'Products'"
                            class="text-base text-gray-900 rounded-lg flex items-center w-full p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Products</button>
                    </li>
                    <li>
                        <button @click.prevent="content = 'Users'"
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
                    <x-template x-show="content === 'Overview'" x-data
                        class="grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-4">
                        @foreach ($tableData as $tableName => $total)
                            <x-overview :tableName="$tableName" :total="$total"></x-overview>
                        @endforeach
                    </x-template>
                    <x-template x-show="content === 'Articles'" x-data>
                        <div class="border border-gray-300 dark:border-gray-600 relative overflow-x-auto sm:rounded-lg">
                            @foreach ($articles as $article)
                                <x-table>
                                    <x-table.thead>
                                        <tr>
                                            <x-table.th scope="col">
                                                #
                                            </x-table.th>
                                            <x-table.th>
                                                Title
                                            </x-table.th>
                                            <x-table.th>
                                                Teaser
                                            </x-table.th>
                                            <x-table.th>
                                                Meta title
                                            </x-table.th>
                                            <x-table.th>
                                                Meta desc.
                                            </x-table.th>
                                            <x-table.th>
                                                Created at
                                            </x-table.th>
                                            <x-table.th>
                                                Updated at
                                            </x-table.th>
                                        </tr>
                                    </x-table.thead>
                                    <tbody>
                                        <x-table.tr>
                                            <x-table.th scope="row">
                                                {{ $loop->iteration }}
                                            </x-table.th>
                                            <x-table.th
                                                class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $article->title }}
                                                </x-table.thth>
                                                <x-table.th>
                                                    {{ $article->teaser }}
                                                </x-table.th>
                                                <x-table.th>
                                                    {{ $article->meta_title }}
                                                </x-table.th>
                                                <x-table.th>
                                                    {{ $article->meta_description }}
                                                </x-table.th>
                                                <x-table.th>
                                                    {{ $article->created_at->Format('d M Y') }}
                                                </x-table.th>
                                                <x-table.th>
                                                    {{ $article->updated_at->Format('d M Y') }}
                                                </x-table.th>
                                        </x-table.tr>
                                    </tbody>
                                </x-table>
                            @endforeach
                        </div>
                    </x-template>
                    <x-template x-show="content === 'Users'" x-data>
                        <div class="border relative overflow-x-auto sm:rounded-lg">
                            <x-table>
                                <x-table.thead>
                                    <tr>
                                        <x-table.th scope="col">
                                            #
                                        </x-table.th>
                                        <x-table.th>
                                            Name
                                        </x-table.th>
                                        <x-table.th>
                                            Email
                                        </x-table.th>
                                        <x-table.th>
                                            Created at
                                        </x-table.th>
                                        <x-table.th>
                                            Updated at
                                        </x-table.th>
                                    </tr>
                                </x-table.thead>
                                <tbody>
                                    <x-table.tr>
                                        <x-table.th scope="row">
                                            2
                                        </x-table.th>
                                        <x-table.th class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Johny Hunter Jr.
                                            </x-table.thth>
                                            <x-table.th>
                                                johnyjr@hunter.com
                                            </x-table.th>
                                            <x-table.th>
                                                1 Aug 2024
                                            </x-table.th>
                                            <x-table.th>
                                                1 Aug 2024
                                            </x-table.th>
                                    </x-table.tr>
                                </tbody>
                            </x-table>
                        </div>
                    </x-template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
