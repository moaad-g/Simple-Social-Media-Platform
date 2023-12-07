@extends('layouts.default')

@section('title', 'P o s t')

@section('content')
    <ul>
        <li>{{ $post -> content }}</li>
        <li>by {{ $post->user->information->name }}</li>
    </ul>

@endsection