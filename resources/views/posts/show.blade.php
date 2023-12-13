@extends('layouts.default')

@section('title', 'Post:')

@section('content')
<div class="bg-gray-500 rounded text-white py-1 px-1 text-sm  border-solid border-2 borer-color border-gray-700" >
    <p>{{ $post -> content }}</p>
</div>
<p class="font-bold text-sm py-3 hover:text-blue-400"><a href="{{ route('users.show', ['id'=>$post->user->id]) }}">Posted By:  {{ $post->user->information->name }}</a></p>
<div class="flex space-x-3">
    @foreach ($post->tags as $tag)
        <a href="{{ route('posts.tagindex', ['id'=>$tag->id])}}" class="hover:text-blue-300">#{{ $tag->name }}</a>
    @endforeach
</div>
<div class="flex space-x-4">
    @if ( Auth::check() && (($is_admin) || $post->user_id == Auth::id()))
    <form method="POST" action="{{ route('posts.destroy', ['id'=>$post->id]) }}">
        @csrf
        @method('DELETE')
        <input class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-1 rounded" type="submit" value="Delete Post">
    </form>
    @endif
    @if ( Auth::check() && ($post->user_id == Auth::id()))
        <a href="{{ route('posts.edit', ['id'=>$post->id])}}" class="text-white font-bold bg-blue-600 hover:bg-blue-700 px-4 py-1 rounded">Edit Post</a>
    @endif
</div>
<div class="py-4">
    <p class="font-bold text-sm underline">Comments:</p>
    <livewire:comview :post="$post" :is_admin="$is_admin">
</div>
@endsection