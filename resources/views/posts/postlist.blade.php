@extends('layouts.default')

@section('title', 'Posts:')

@section('content')
    <div>
        <ul>
        @foreach ($post_list as $post)
        <li><a href="{{ route('posts.show', ['id'=>$post->id]) }}"> {{ $post->content }}</a></li>
        @endforeach
        </ul>
    </div>
@endsection