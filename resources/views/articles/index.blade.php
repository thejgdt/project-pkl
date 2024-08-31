<x-app-layout>
    @slot('title', 'Blog')

    <div class="lg:mt-0">
        <div class="relative isolate pt-20">
            <div class="pt-14">
                <div class="lg:px-8 mx-auto px-4 sm:px-6">
                    <div class="flex flex-col">
                        <div class="max-w-xl flex-1">
                            <h1 class="text-2xl font-bold tracking-tighter text-fg sm:text-3xl lg:text-5xl">
                                {{ __('Articles') }}</h1>
                        </div>
                        <div class="relative mt-4 lg:mt-6">
                            <div class="hide-scroll hidden max-w-2xl items-center gap-x-6 overflow-x-auto sm:flex">
                                <div class="flex gap-4 flex-col">
                                    <div class="flex flex-row gap-x-5 border-b border-none">
                                        <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                                            {{ __('All') }}
                                        </x-nav-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($articles as $article)
                <div
                    class="relative space-y-4 sm:rounded-xl border border-gray-300 p-6 backdrop-blur focus:outline-none hover:ring-1 focus:ring-1 dark:ring-inset">
                    <div class="flex items-center justify-between gap-x-2">
                        <div class="font-mono font-bold  text-md">
                            {{ $article->author }}
                        </div>
                        <div class="font-mono text-sm">
                            {{ $article->likes->count() }}
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="relative space-y-1">
                        <a href="{{ route('blog.show', $article->slug) }}">
                            <h2 class="line-clamp-1 text-lg font-medium">
                                {{ $article->title }}
                            </h2>
                            <p class="mb-4 line-clamp-2 text-sm">
                                {{ $article->teaser }}
                            </p>
                        </a>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="space-x-1">
                            <span
                                class="[&amp;_[data-slot=icon]]:size-3 inline-flex items-center gap-x-1.5 rounded-full px-2 py-0.5 text-xs/5 font-medium ring-1 dark:ring-inset forced-colors:outline">
                                <a class="focus:outline-none" href="">
                                    {{ __('Read more') }} &raquo;
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</x-app-layout>
