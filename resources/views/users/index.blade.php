<x-app-layout>
    @slot('title', 'User')

    <x-slot name="header">
        <div class="py-6 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User List') }}
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach ($users as $user)
                <div class="px-4 py-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <article>
                        <a href="users/{{ $user->id }}"
                            class="mb-1 text-3xl tracking-tight font-bold text-gray-900 dark:text-white hover:underline">
                            {{ $user->name }}
                        </a>
                        <div class="text-base text-gray-500 dark:text-gray-400">
                            <b>{{ $user->email }}</b> | {{ $user->created_at->format('M d, Y') }}
                        </div>
                        <div class="pt-4">
                            <a href="users/{{ $user->id }}" class="font-medium text-blue-500 hover:underline">View
                                more &raquo;</a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
