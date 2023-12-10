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
                @if (session('message'))
                <div px-10>
                    <h3 class="text-white text-center font-bold bg-blue-400 px-4 py-2 rounded">{{ session('message') }}</h3>
                </div>
                @endif
                <div>
                <h1 class="text-center font-bold underline">@yield('title')</h1>
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
