<x-app-layout>
    @slot('title', $user->name)

    <x-slot name="header">
        <div
            class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                {{ $user->name }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                <b>{{ $user->email }}</b> | Created {{ $user->created_at->format('M d, Y') }}
            </p>
        </div>
    </x-slot>
</x-app-layout>
