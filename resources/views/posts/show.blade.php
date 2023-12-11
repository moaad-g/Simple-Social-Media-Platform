@extends('layouts.default')

@section('title', 'P o s t')

@section('content')
<div class="bg-gray-500 rounded text-white py-1 px-1 text-sm  border-solid border-2 borer-color border-gray-700" >
    <p>{{ $post -> content }}</p>
</div>
<div>
    <p class="font-bold text-sm py-3">Posted By:  {{ $post->user->information->name }}</p>
    @if (($is_admin) || $post->user_id == Auth::id())
    <form method="POST" action="{{ route('posts.destroy', ['id'=>$post->id]) }}">
        @csrf
        @method('DELETE')
        <input class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-1 rounded" type="submit" value="Delete Post">
    </form>
    @endif
</div>
<div class="py-10">
    <!-- <a href="{{ route('posts.show', ['id'=>$post->user->id]) }}"> {{ $post->user->information->name }}</a> -->
    <p class="font-bold text-sm">Comments:</p>
    @foreach ( $comment_list as $comment )
    <ul>
        <li class="bg-gray-300 py-1">{{ $comment->content }}</li>
        <div class="flex justify-start">
            <li class="bg-gray-300 text-sm px-5">{{ $comment->user->information->name  }}</li>
            @if (($is_admin) || $post->user_id == Auth::id())
            <form method="POST" action="{{ route('posts.destroycomm', ['id'=>$post->id , 'comm_id'=>$comment->id]) }}">
                @csrf
                @method('DELETE')
                <input class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-1 rounded text-xs" type="submit" value="Delete Comment">
            </form>
            @endif
        <div>
    </ul>
    @endforeach
</div>


@endsection