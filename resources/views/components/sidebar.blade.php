<aside id="sidebar"
    class="fixed mx-4 top-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar" x-data="{ openCrud: false }">
    <div class="flex flex-col flex-1 py-5 overflow-y-auto">
        <div
            class="flex-1 p-4 space-y-1 border border-gray-300 dark:border-gray-600 rounded-lg bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            <ul class="pb-2 space-y-2">
                {{ $slot }}
            </ul>
        </div>
    </div>
</aside>
