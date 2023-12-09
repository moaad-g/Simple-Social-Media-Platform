@extends('layouts.default')

@section('title', 'P o s t')

@section('content')
<div>
    <p>{{ $post -> content }}</p>
    <p>Posted By:{{ $post->user->information->name }}</p>
</div>
<div>
    <!-- <a href="{{ route('posts.show', ['id'=>$post->user->id]) }}"> {{ $post->user->information->name }}</a> -->
    <p>comments:</p>
    <ul>
        @foreach ( $comment_list as $comment )
            <li class="text-black hover:bg-blue-100">{{ $comment -> content }}</li>
        @endforeach
    </ul>
</div>


@endsection