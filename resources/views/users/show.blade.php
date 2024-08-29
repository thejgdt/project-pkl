<x-app-layout>
    @slot('title', $user->name)

    <x-slot name="header">
        <div class="relative">
            <!-- Background Banner -->
            <div class="h-64 rounded-2xl bg-gradient-to-r from-purple-600 via-pink-600 to-red-500"></div>

            <!-- Profile Card -->
            <div class="relative">
                <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 w-full max-w-7xl">
                    <div
                        class="bg-white/80 backdrop-blur-2xl backdrop-saturate-200 shadow-lg rounded-2xl p-6 flex justify-between items-center">
                        <!-- Left Section: Profile Image, Name, Created Date -->
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/100" alt="Profile Image"
                                class="w-24 h-24 rounded-2xl shadow-md">
                            <div class="text-left">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
                                <p class="text-gray-500">{{ 'Joined ' . $user->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 py-6">
            <!-- Profile Information -->
            <div class="bg-white h-fit p-6 rounded-2xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('Profile Info') }}</h3>
                <p class="mt-2 text-gray-600">{{ $user->description }}</p>
                <div class="mt-4">
                    <p class="text-gray-800 font-semibold">{{ __('Full Name') }}</p>
                    <p class="text-gray-600">{{ $user->name }}</p>
                </div>
                <div class="mt-2">
                    <p class="text-gray-800 font-semibold">{{ __('Email') }}</p>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Articles Section -->
            <div class="lg:col-span-3 space-y-6">
                <div class="w-full">
                    <h3 class="text-lg font-semibold text-gray-800">Articles</h3>
                    <p class="text-gray-600"><b>{{ $user->name . ' ' }}</b>Articles</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @if ($articles->isEmpty())
                        <div class="col-span-1 md:col-span-3 flex justify-center items-center h-32">
                            <p class="text-center text-gray-600 text-lg">This user has not written any articles yet.</p>
                        </div>
                    @else
                        @foreach ($articles as $article)
                            <div class="bg-white p-6 rounded-2xl shadow-lg">
                                <img src="https://via.placeholder.com/150" alt="Project Image" class="rounded-lg mb-4">
                                <h4 class="text-xl font-semibold text-gray-800">{{ $article->title }}</h4>
                                <p class="text-gray-600 mt-2">{{ $article->teaser }}</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('blog.show', $article->slug) }}"
                                        class="text-pink-600 font-semibold">{{ __('Read Article') }}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
