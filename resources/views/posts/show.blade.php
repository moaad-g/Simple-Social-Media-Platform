@extends('layouts.default')

@section('title', 'P o s t')

@section('content')
    <ul>
        <li>Something: {{ $post -> content }}<li>
        <li>Something: {{ $post -> content }}<li>
    </ul>

@endsection