@extends('layouts.default')

@section('title', 'Posts:')

@section('content')
    <div>
        <ul>
        @foreach ($post_list as $post)
        <li>{{ $post -> content }}</li>
        @endforeach
        </ul>
    </div>
@endsection