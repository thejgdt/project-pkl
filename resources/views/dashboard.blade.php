<x-app-layout>
    @slot('title', 'Dashboard')

    <div x-data="{ content: '{{ $activeTable }}', openCrud: false }" class="flex pt-16 overflow-hidden bg-gray-100 dark:bg-gray-900">
        <x-sidebar :filteredTables="$filteredTables" :activeTable="$activeTable">
            @foreach ($filteredTables as $table)
                <li>
                    <a href="{{ route('dashboard', ['activeTable' => ucwords(str_replace('_', ' ', $table))]) }}"
                        class="text-base text-gray-900 rounded-lg flex items-center w-full p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">
                        {{ ucwords(str_replace('_', ' ', $table)) }}
                    </a>
                </li>
            @endforeach
        </x-sidebar>

        <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-[17rem]">
            <div class="pt-5 flex flex-col">
                <!-- Header -->
                <div
                    class="flex justify-between lg:fixed lg:left-[17rem] lg:right-0 border border-gray-300 dark:border-gray-600 p-4 mx-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                    @if ($activeTable !== 'Overview')
                        <x-primary-button as="a" href="{{ $createUrl }}">
                            {{ __('Create New ' . $activeTable) }}
                        </x-primary-button>
                    @endif
                </div>
            </div>
            <!-- Content Wrapper -->
            <div class="flex-1 flex flex-col lg:mt-20 xl:mt-24">
                <div class="flex-1 p-4 h-full">
                    <x-template x-show="content === 'Overview'"
                        class="grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-4">
                        @foreach ($tableData as $tableName => $total)
                            <x-overview :tableName="$tableName" :total="$total"></x-overview>
                        @endforeach
                    </x-template>
                    @foreach ($columns as $contentType => $columnNames)
                        <x-template x-show="content === '{{ $contentType }}'">
                            <div
                                class="border border-gray-300 dark:border-gray-600 relative overflow-x-auto sm:rounded-lg">
                                <x-table>
                                    <x-table.thead>
                                        <tr>
                                            @foreach ($columnNames as $column)
                                                <x-table.th scope="col">{{ $column }}</x-table.th>
                                            @endforeach
                                        </tr>
                                    </x-table.thead>
                                    <tbody>
                                        @foreach ($rows[$contentType] as $item)
                                            <x-table.tr>
                                                <x-table.th scope="row">{{ $loop->iteration }}</x-table.th>
                                                <x-table.th
                                                    class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item['title'] ?? $item['name'] }}
                                                </x-table.th>
                                                <x-table.th>{{ $item['author'] ?? $item['email'] }}</x-table.th>
                                                <x-table.th>{{ $item['created_at'] }}</x-table.th>
                                                <x-table.th>{{ $item['updated_at'] }}</x-table.th>
                                                <x-table.th class="space-y-0.5">
                                                    <x-primary-button as="a"
                                                        href="{{ $item['action']['edit'] }}">
                                                        {{ __('Edit') }}
                                                    </x-primary-button>
                                                    <form action="{{ $item['action']['delete'] }}" method="POST"
                                                        onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-danger-button>
                                                            {{ __('Delete') }}
                                                        </x-danger-button>
                                                    </form>
                                                </x-table.th>
                                            </x-table.tr>
                                        @endforeach
                                    </tbody>
                                </x-table>
                            </div>
                        </x-template>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
