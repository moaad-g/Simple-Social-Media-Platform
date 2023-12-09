<!DOCTYPE html>
<html>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <head>
            @livewireStyles
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <livewire:navbar /> 
        </head>
        <body>
            <div class="min-h-screen bg-gray-300 py-2 px-2">
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
                        <li class="text-red">{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @livewireScripts
        </body>
</html>
