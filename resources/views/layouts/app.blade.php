<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <title>Document</title>
</head>
<body>
    <div id="app">

        @yield('content')

    </div>


    @if(Auth::check())
        <script>
            window.user = {!! Auth::user() !!}

        </script>
    @endif

    @yield('scripts')
</body>
</html>
