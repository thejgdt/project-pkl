<x-app-layout>
    @slot('title', $article->title)

    <div class="mx-auto pt-20 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto py-4 sm:py-6 lg:py-8 px-6 sm:px-8 lg:px-10">
            <div class="max-w-3xl mb-10 lg:mb-20">
                <!-- Header -->
                <header>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">
                        {{ $article->created_at->format('M d, Y') }}
                    </p>
                    <h1 class="mt-2 text-3xl font-bold text-gray-800 dark:text-gray-200">
                        {{ $article->title }}
                    </h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-500">{{ $article->teaser }}</p>
                </header>
            </div>
            <div class="mt-6">
                <div class="flex flex-col gap-6 lg:flex-row lg:gap-16">
                    <div class="w-full max-w-3xl shrink-0 lg:w-2/3">
                        <article class="prose lg:prose-xl">
                            <p class="text-gray-800 dark:text-gray-200">
                                {{ $article->body }}
                            </p>
                        </article>
                    </div>
                    <div class="sticky top-28 hidden w-1/3 space-y-8 self-start pb-6 lg:block lg:pb-12">
                        <div class="flex items-center gap-x-2">
                            <x-primary-button>
                                {{ __('Bagikan') }}
                            </x-primary-button>
                            @if ($article->likes()->where('user_id', Auth::id())->exists())
                                <form action="{{ route('articles.unlike', $article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>
                                        {{ __('Unlike') }}
                                    </x-danger-button>
                                </form>
                            @else
                                <form action="{{ route('articles.like', $article->id) }}" method="POST">
                                    @csrf
                                    <x-primary-button>
                                        {{ __('Like') }}
                                    </x-primary-button>
                                </form>
                            @endif
                        </div>
                        <div>
                            <a class="flex" href="/users">
                                <div>
                                    <h4 class="font-medium text-sm text-gray-800 dark:text-gray-100">
                                        {{ $article->author }}
                                    </h4>
                                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
                                        {{ __('Desc. of the user (soon)') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div>
                            <h4
                                class="font-sans font-medium text-base sm:text-sm tracking-normal text-gray-600 dark:text-gray-500 mb-2">
                                {{ __('Baca artikel lainnya') }}
                            </h4>
                            <div class="-mx-4">
                                @foreach ($randomArticles as $article)
                                    <a href="{{ route('blog.show', $article->slug) }}">
                                        <div
                                            class="mb-2 focus:outline-none hover:ring-1 focus:ring-1 dark:ring-inset flex items-center justify-between gap-x-6 rounded-lg px-4 py-3">
                                            <div class="line-clamp-1 font-medium text-gray-800 dark:text-gray-200">
                                                {{ $article->title }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
