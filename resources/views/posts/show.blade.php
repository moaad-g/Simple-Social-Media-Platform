@extends('layouts.default')

@section('title', 'P o s t')

@section('content')
<div>
    <p>{{ $post -> content }}</p>
    <p>{{ $post->user->information->name }}</p>
</div>
<div class=>

    <!-- <a href="{{ route('posts.show', ['id'=>$post->user->id]) }}"> {{ $post->user->information->name }}</a> -->
    <p>comments:</p>
    <ul>
        @foreach ( $comment_list as $comment )
            <li>{{ $comment -> content }}</li>
        @endforeach
    </ul>
<div>


@endsection