<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BDO Guilds') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/f6ba56508a.js" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- MDBootstrap -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/mdb.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white">
            <div class="container position-relative">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto mr-lg-3" href="{{ url('/') }}">
                        {{ (!Auth::guest() && isset(Auth::user()->guild) ? Auth::user()->guild->name : config('app.name', 'BDO Guilds')) }}
                </a>
                @auth
                    <a class="nav-link d-flex align-items-center d-inline-block d-lg-none">
                        <div style="background-image: url({{ Auth::user()->avatar }})" class="rounded-circle z-depth-0 user-avatar"></div>
                    </a>
                @endauth
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mr-auto">
                        @include('layouts.menu.main')
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if ( Route::has('register') )
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @include('layouts.menu.user.dropdown')
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="pt-5 mt-5">
            @yield('content')
        </main>
    </div>
    @include('layouts.include.messages')
</body>
</html>
