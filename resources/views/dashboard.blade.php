<x-app-layout>
    <div x-data="{ content: 'Overview', openCrud: false }" class="flex pt-16 overflow-hidden bg-gray-100 dark:bg-gray-900">

        <x-sidebar :filteredTables="$filteredTables">
            @foreach ($filteredTables as $table)
                <li>
                    <button @click.prevent="content = '{{ ucwords(str_replace('_', ' ', $table)) }}'"
                        class="text-base text-gray-900 rounded-lg flex items-center w-full p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">{{ ucwords(str_replace('_', ' ', $table)) }}</button>
                </li>
            @endforeach
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
                                    @foreach ($articles as $article)
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
                                    @endforeach
                                </tbody>
                            </x-table>
                        </div>
                    </x-template>
                    <x-template x-show="content === 'Users'" x-data>
                        <div class="border border-gray-300 dark:border-gray-600 relative overflow-x-auto sm:rounded-lg">
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
                                    @foreach ($users as $user)
                                        <x-table.tr>
                                            <x-table.th scope="row">
                                                {{ $loop->iteration }}
                                            </x-table.th>
                                            <x-table.th
                                                class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $user->name }}
                                                </x-table.thth>
                                                <x-table.th>
                                                    {{ $user->email }}
                                                </x-table.th>
                                                <x-table.th>
                                                    {{ $user->created_at->Format('d M Y') }}
                                                </x-table.th>
                                                <x-table.th>
                                                    {{ $user->updated_at->Format('d M Y') }}
                                                </x-table.th>
                                        </x-table.tr>
                                    @endforeach
                                </tbody>
                            </x-table>
                        </div>
                    </x-template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
