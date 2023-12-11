@vite('resources/css/app.css')
@extends('layouts.default')

@section('title', 'Posts:')

@section('content')
    <div class="grid grid-cols-3 gap-3">
        @foreach ($user_list as $user)
            <div class="bg-gray-600 rounded text-white py-1 px-1 text-sm hover:bg-gray-400 hover:text-blue-500 border-solid border-2 border-gray-700 ">
                <button><a href="{{ route('posts.index') }}"> {{ $user->email }}<br> {{ $user->information->name }} </a></button>
            </div>
        @endforeach
    </div>
@endsection