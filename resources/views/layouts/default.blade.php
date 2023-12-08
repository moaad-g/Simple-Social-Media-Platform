<!DOCTYPE html>
<head>
    @livewireStyles
    <livewire:navbar /> 
</head>
<body>
    <h1>BaceFook - @yield('title')</h1>
    <h2><a  href="{{ route('posts.create') }}"> New Post</a></h2>
    <div>
        @yield('content')
    </div>
    @if ($errors->any())
    <div>
        Errors:
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}
        @endforeach
        </ul>
    </div>
    @endif
    @livewireScripts
</body>
