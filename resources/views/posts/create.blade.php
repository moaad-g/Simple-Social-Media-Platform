@extends('layouts.default')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Content: <input type="text" name="content"  value="{{ old('content') }}"></p>
        <input type="submit" value="Post">
        <a href="{{ route('posts.index') }}">Back</a>
    </form>
@endsection