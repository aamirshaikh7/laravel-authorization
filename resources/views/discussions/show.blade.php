<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p class="pb-6">
                    <a href="{{ route('discussions.index') }}" class="underline">Back</a>
                </p>

                <h1 class="pb-3">{{ $discussion->title }}</h1>

                <div class="pb-3">
                    {{ $discussion->body }}
                </div>

                <p>Posted by : {{ $discussion->user->name }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
