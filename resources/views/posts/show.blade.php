@extends('layouts.default')

@section('title', 'P o s t')

@section('content')
<div class="bg-gray-500 rounded text-white py-1 px-1 text-sm  border-solid border-2 borer-color border-gray-700" >
    <p>{{ $post -> content }}</p>
</div>
<div>
    <p class="font-bold text-sm py-3">Posted By:  {{ $post->user->information->name }}</p>
    @if ($is_admin)
     <a href="{{ route('posts.index') }}" class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-1 rounded" >Delete</a>
    @endif
</div>
<div class="py-10">
    <!-- <a href="{{ route('posts.show', ['id'=>$post->user->id]) }}"> {{ $post->user->information->name }}</a> -->
    <p class="font-bold text-sm">Comments:</p>
    <ul>
        @foreach ( $comment_list as $comment )
            <li class="bg-gray-300 py-1">{{ $comment->content }}</li>
            <li class="bg-gray-300 text-sm">{{ $comment->user->information->name  }}</li>
        @endforeach
    </ul>
</div>


@endsection