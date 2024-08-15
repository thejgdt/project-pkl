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
                    {{ __('Jumlah ' . $tableName) }}
                </p>
            </div>
            <h3 class="text-sky-400 font-bold text-xl">
                {{ $total }}
            </h3>
        </div>
    </div>
    <!-- Bottom Bar -->
    <div class="px-6 py-4">
        <x-primary-button class="w-full justify-center">{{ __('VIEW TABLE') }}</x-primary-button>
    </div>
</div>
