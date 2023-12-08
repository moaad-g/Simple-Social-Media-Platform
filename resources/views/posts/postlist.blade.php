@vite('resources/css/app.css')
@extends('layouts.default')

@section('title', 'Posts:')

@section('content')
    <div class="grid grid-cols-3 gap-2 bg-gray-600">
        @foreach ($post_list as $post)
            <div class="bg-gray-600">
                <a href="{{ route('posts.show', ['id'=>$post->id]) }}"> {{ $post->content }}</a>#
            </div>
        @endforeach
    </div>
@endsection