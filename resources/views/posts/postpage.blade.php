@extends('layouts.default')

@section('title', 'Posts:')

@section('content')
    @if ($post_id)
        <div>
            <p>baked beans</p>
        </div>
    @else
        <div>
            <p>baked beanssss</p>
        </div>
    @endif
@endsection