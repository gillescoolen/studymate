<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studymate</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body>
        <div id="app" style="margin-bottom: 25px;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                        <span class="navbar-brand" href="/">Studymate</span>

                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/deadline') }}">Deadline manager</a>
                            </li>
                            @guest
                            @else
                                <li class="nav-item">
                                <a class="nav-link" dusk="logout" href="{{ route('logout') }}">Uitloggen</a>
                                </li>
                            @endguest
                        </ul>
                        @guest
                            <span class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </span>
                        @else
                            Welkom, {{ Auth::user()->name }}
                        @endguest
                    </div>
                </div>
            </nav>
            <div class="container">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div dusk="error" class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if (Session::has('message'))
                    <div dusk="success" class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </body>
</html>