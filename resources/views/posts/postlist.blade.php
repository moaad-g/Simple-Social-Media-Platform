@vite('resources/css/app.css')
@extends('layouts.default')

@section('title', $title)

@section('content')
    <div class="grid grid-cols-3 gap-3">
        @foreach ($post_list as $post)
            <div class="bg-gray-600 rounded text-white py-1 px-1 text-sm hover:bg-gray-400 border-solid border-2 borer-color border-gray-700 ">
                <button><a href="{{ route('posts.show', ['id'=>$post->id]) }}"> {{ $post->content }}</a></button>
            </div>
        @endforeach
    </div>
    <div class="flex items-center justify-center py-3">
        {{ $post_list->links() }}
    </div>
@endsection