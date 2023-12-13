@extends('layouts.default')

@section('title', 'Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class = "flex flex-row justify-center items-center">
            <input class="text- box-content h-32 w-64 text-left align-top" type="text" name="content" placeholder="Type Here..." value="{{ old('content') }}">
        </div>
        <div class="flex items-center justify-center">
            <select id="tags" name="tag_list" class="bg-gray-50" multiple>
            <option selected>Choose tags</option>
            @foreach ($tag_list as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
            </select>
        </div>
        <p class="flex items-center justify-center"> Ctrl+click to select multiple tags <p>
        <div class = "flex flex-row justify-center items-center py-5 space-x-3">
            <input class="text-white font-bold bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded" type="submit" value="Post">
            <a href="{{ route('posts.index') }}" class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-2 rounded" >Back</a>
        </div>
    </form>
@endsection
