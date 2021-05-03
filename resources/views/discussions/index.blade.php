<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <form class="pb-3" action="{{ route('discussions.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3 pt-0">
                        <input value="{{ old('title') }}" type="text" placeholder="Discussion Title *" name="title" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-3 shadow outline-none focus:outline-none w-full"/><span></span>
                        @error ('title')
                            <div class="pt-2" role="alert">
                                <div class="border border-3 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                    <p>{{ $errors->first('title') }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 pt-0">
                        <input value="{{ old('body') }}" type="text" placeholder="Discussion Body (Optional)" name="body" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-3 shadow outline-none focus:outline-none w-full"/>
                        @error ('body')
                            <div class="pt-2" role="alert">
                                <div class="border border-3 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>{{ $errors->first('body') }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Start a Discussion
                    </button>
                </form>
                
                @forelse ($discussions as $discussion)
                    <p class="pb-4 pt-4"><a href="{{ route('discussions.show', $discussion) }}">{{ $discussion->title }}</a><span class="text-xs pl-2 text-gray-400">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $discussion->created_at)->format('d-M-Y') }}</span></p>
                @continue ($loop->last)    
                    <hr>
                @empty
                    <p class="pt-2">No discussions yet !</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
