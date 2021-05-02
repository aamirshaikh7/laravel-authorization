<div class="antialiased">
    <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
    <div class="space-y-4">      
        <div class="mb-3 pt-0">
            <input type="text" placeholder="Add a Comment" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-3 shadow outline-none focus:outline-none w-full"/>
        </div>      
        <div class="flex">
            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                @forelse ($discussion->comments as $comment)
                    <div class="py-4">
                        <strong>
                            @if ($comment->user->name == $comment->discussion->user->name)
                                {{ $comment->user->name }} <span class="text-xs pl-2 text-gray-400">Author</span>
                            @else
                                {{ $comment->user->name }}
                            @endif
                        </strong> <span class="text-xs pl-2 text-gray-400">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                        <p class="text-sm">
                            {{ $comment->body }}
                        </p>
                    </div>
                @continue ($loop->last)    
                    <hr>
                @empty
                    <p class="text-sm">
                        No comments yet !
                    </p>
                @endforelse
            </div>
            
        </div>
    </div>
</div>