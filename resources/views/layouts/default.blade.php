<!DOCTYPE html>
    <html>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <head>
            @livewireStyles
            <livewire:navbar /> 
        </head>
        <body>
            <h1>BaceFook - @yield('title')</h1>
            @if (session('message'))
                <h3>{{ session('message') }}</h3>
            @endif
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
    </html>
</body>
