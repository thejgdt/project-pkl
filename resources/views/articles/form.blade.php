<x-app-layout>
    @slot('title', $meta_page['title'])

    <div
        class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 sm:mx-4 bg-gray-100 dark:bg-gray-900">
        <div>
            <h1 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-normal">
                {{ $meta_page['title'] }}
            </h1>
        </div>

        <div
            class="w-full sm:max-w-3xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ $meta_page['url'] }}">
                @method($meta_page['method'])
                @csrf

                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" :value="old('title', $article->title)" class="block mt-1 w-full" type="text" name="title"
                        placeholder="Article title" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Content -->
                <div class="mt-4">
                    <x-input-label for="body" :value="__('Content')" />
                    <x-input-area id="body" :value="old('body', $article->body)" rows="4" class="block mt-1 w-full"
                        name="body" placeholder="Article content" required />
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ $meta_page['submit_text'] }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
