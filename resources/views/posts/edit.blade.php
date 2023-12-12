@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
    <form method="POST" action="{{ route('posts.update', ['id'=>$post->id] ) }}">
        @csrf
        <div class = "flex flex-row justify-center items-center">
            <input class="text- box-content h-32 w-64 text-left align-top" type="text" name="content" placeholder="Type Here..." value="{{ $post->content }}">
        </div>
        <div class = "flex space-x-4 justify-center items-center py-5">
            <input class="text-white font-bold bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded" type="submit" value="Post">
            <a href="{{ route('posts.show' , ['id'=>$post->id] )  }}" class="text-white font-bold bg-red-600 hover:bg-red-700 px-4 py-2 rounded" >Back</a>
        </div>
    </form> 
@endsection
