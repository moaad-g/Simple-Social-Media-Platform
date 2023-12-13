@extends('layouts.default')

@section('content')
    <div class ="flex items-center justify-center text- font-bold py-3">
        <h1> Welcome to the Coursework Posts project!!! </h1>
    </div>
    <div class ="h-1/2 flex items-center justify-center text-xl space-x-4">
        <a href="/login" class="text-white font-bold bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded" >Login</a>
        <a href="/register" class="text-white font-bold bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded" >Register</a>
    </div>


@endsection