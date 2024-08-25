<x-app-layout>
    @slot('title', 'Blog')

    <x-slot name="header">
        <div class="py-6 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Blog') }}
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <div class="px-4 py-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <article>
                        <a href="blog/{{ $article->slug }}"
                            class="mb-1 text-3xl tracking-tight font-bold text-gray-900 dark:text-white hover:underline">
                            {{ $article->title }}
                        </a>
                        <div class="text-base text-gray-500 dark:text-gray-400">
                            <a href="#"><b>{{ $article->author }}</b></a> |
                            {{ $article->created_at->format('M d, Y') }}
                        </div>
                        <p class="py-4 font-light text-gray-700 dark:text-gray-300">
                            {{ $article->teaser }}
                        </p>
                        <a href="blog/{{ $article->slug }}" class="font-medium text-blue-500 hover:underline">Read
                            more &raquo;</a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
