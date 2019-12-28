<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

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
        <nav class="mb-1 navbar navbar-expand-lg navbar-light white">
            <div class="container position-relative">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto mr-lg-3" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                @auth
                    <a class="nav-link d-flex align-items-center d-inline-block d-lg-none">
                        <div style="background-image: url({{ Auth::user()->avatar }})" class="rounded-circle z-depth-0 user-avatar"></div>
                    </a>
                @endauth
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
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
                            <li class="nav-item d-none d-lg-inline-block">
                                <a class="nav-link dropdown-toggle d-flex align-items-center"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <div style="background-image: url({{ Auth::user()->avatar }})" class="rounded-circle z-depth-0 user-avatar"></div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right scrollbar-default" aria-labelledby="navbarDropdown">
                                    <div class="row mx-0">
                                        <div class="col-auto text-center">
                                            <div class="">
                                                <img src="{{ Auth::user()->avatar }}" class="rounded-circle z-depth-0" style="object-fit: cover; width: 6rem; height: 6rem"/>
                                            </div>
                                        </div>
                                        <div class="col text-right">
                                            <h5 class="font-weight-bold dark-grey-text">{{ Auth::user()->user }}</h5>
                                            <h6 class="grey-text"><strong>{{ Auth::user()->family }}</strong></h6>
                                            <a href="{{ url('account/manage') }}" class="btn btn-rounded btn-danger btn-sm text-white px-2 py-1 mx-0"><small><i class="far fa-user pr-2" aria-hidden="true"></i>Account</small></a>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Account</h6>
                                    <a class="dropdown-item d-block" href="{{ url('account/characters') }}"><i class="far fa-comment-alt mr-1"></i>Characters</a>
                                    <a class="dropdown-item d-block" href="{{ url('account/messages') }}"><i class="far fa-comment-alt mr-1"></i>Messages</a>
                                    <div class="dropdown-divider"></div>
                                    @if ( Auth::user()->id = 1 )
                                        <h6 class="dropdown-header">Administration</h6>
                                        <a class="dropdown-item d-block" href="/Account/Manage/Chat"><i class="fas fa-comments mr-1"></i>Discussion</a>
                                        <a class="dropdown-item d-block" href="/Admin/Users"><i class="fas fa-users mr-1"></i>Gestion des utilisateurs</a>
                                        <a class="dropdown-item d-block" href="/Admin/SendNotifications"><i class="fas fa-paper-plane mr-1"></i>Envoyer notifications</a>
                                        <a class="dropdown-item d-block" href="/Admin/Dashboard"><i class="fas fa-tachometer-alt mr-1"></i>Tableau de bord</a>
                                        <a class="dropdown-item d-block" href="/Admin/JavascriptConsole"><i class="fas fa-bug mr-1"></i>Console Javascript</a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    <form method="post">
                                        <button class="dropdown-item"><i class="fas fa-power-off mr-1"></i>Déconnexion</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
