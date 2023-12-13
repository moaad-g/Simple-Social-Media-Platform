<div>
    @if ( Auth::check())
    <div class="py-1">
        <div>
            @if($this->expanded)
                <textarea wire:model="content" rows="4" cols="50">Type Here...</textarea>
                <div class="flex space-x-4 text-white font-bold">
                    <button class="text-sm bg-blue-600 hover:bg-blue-700 rounded px-3" wire:click="save">Post</button>
                    <button class="text-sm bg-red-600 hover:bg-red-700 rounded px-3" wire:click="collapse">Close</button>
                </div>
            @else
                <button class="text-white font-bold bg-blue-600 hover:bg-blue-700 px-4 py-1 rounded"  wire:click="expand">New Comment</button>
            @endif
        </div>
    </div>
    @endif
    <div>
        @foreach ( $comment_list as $comment )
            <ul>
                <div class="py-2">
                    <li class="bg-gray-300 py-1 font-bold">{{ $comment->content }}</li>
                    <div class="flex flex-row space-x-3">
                        <a href="{{ route('users.show', ['id'=>$comment->user->id]) }}" class="hover:text-blue-300">{{ $comment->user->information->name  }}</a></li>
                        @if (($is_admin) || $comment->user_id == Auth::id())
                        <form method="POST" action="{{ route('posts.destroycomm', ['id'=>$post->id , 'comm_id'=>$comment->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-1 rounded text-xs" type="submit" value="Delete Comment">
                        </form>
                        <livewire:comedit :comment="$comment">
                        @endif
                    <div>
                <div class="py-2">
            </ul>
        @endforeach
    </div>
</div>