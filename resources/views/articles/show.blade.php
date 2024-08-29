<x-app-layout>
    @slot('title', $article->title)

    <x-slot name="header">
        <div
            class="flex flex-col sm:items-center sm:justify-center p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-3xl font-bold sm:text-center text-gray-900 dark:text-gray-100">
                {{ $article->title }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                {{ __('By') }} <a href="#" class="text-sm text-gray-600 dark:text-gray-400">
                    <b>{{ $article->author }}</b></a> | {{ $article->created_at->format('M d, Y') }}
            </p>
        </div>
    </x-slot>
    <div class="py-6 px-12">
        <p class="xl:max-w-4xl text-gray-900 dark:text-gray-200">
            {!! nl2br(e($article->body)) !!}
        </p>
    </div>
</x-app-layout>
