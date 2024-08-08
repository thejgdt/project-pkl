<aside
    class="h-auto fixed top-0 left-0 bottom-0 w-64 mt-20 mb-6 rounded-xl mx-0 sm:mx-4 transition-transform -translate-x-full bg-white border border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 rounded-xl px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            {{ $slot }}
        </ul>
    </div>
</aside>
