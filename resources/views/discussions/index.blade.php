<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse ($discussions as $discussion)
                    <p class="pb-4 pt-4"><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a><span class="text-xs pl-2 text-gray-400">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $discussion->created_at)->format('d-M-Y') }}</span></p>
                @continue ($loop->last)    
                    <hr>
                @empty
                    <p>No discussions yet !</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
