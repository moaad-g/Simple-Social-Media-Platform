@extends('layouts.default')

@section('title', $user->information->name )

@section('content')

<div class="flex items-center justify-center space-x-5">
    <p class="font-bold text-m">Email: {{ $user->email }}</p>
    <p class="font-bold text-m">Number: {{ $user->information->phone_number }}</p>
</div>
<h1 class="font-bold">Posts:</h1>
<div class="grid grid-cols-3 gap-3 py-2">
    @foreach ($post_list as $post)
        <div class="bg-gray-600 rounded text-white py-1 px-1 text-sm hover:bg-gray-400 border-solid border-2 borer-color border-gray-700 ">
            <button><a href="{{ route('posts.show', ['id'=>$post->id]) }}"> {{ $post->content }}</a></button>
        </div>
    @endforeach
</div>
<h1 class="font-bold">Comments:</h1>
<div class="grid grid-cols-3 gap-3">
    @foreach ($comment_list as $comment)
        <div class="bg-gray-600 rounded text-white py-1 px-1 text-sm hover:bg-gray-400 border-solid border-2 borer-color border-gray-700 ">
            <button><a href="{{ route('posts.show', ['id'=>$comment->post->id]) }}"> {{ $comment->content }}</a></button>
        </div>
    @endforeach
</div>
@endsection