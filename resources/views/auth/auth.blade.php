@extends('layouts.app')

@section('content')
    <style>
        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }


        .but {
            border-radius: 20px;
            border: 1px solid #FFFFFF;
            background-color: #33b5e5;
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            padding: 14px 35px;
            letter-spacing: 1px;
            text-transform: uppercase;

        }

        form {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .social-container {
            margin: 5px ;
        }

        .social-container a {
            border: 1px solid #dddddd;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        .container.auth-form {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }
        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #33b5e5;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #ffffff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    </style>
    <div class="container auth-form mt-5 @if($action === 'register') right-panel-active @endif">
        <div class="form-container sign-up-container mt-2">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="font-weight-bold">Create Account</h1>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password" type="password" class="@error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="btn btn-info btn-rounded">Sign up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="font-weight-bold">Sign in</h1>
                <input id="email" name="email" type="email" class="@error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password" type="password" placeholder="{{ __('Password') }}" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group row">
                    <div class="col">
                        <div class="form-check pl-0">
                            <input class="form-check-input pl-4" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-rounded ">Sign in</button>
                @if ( Route::has('password.request') )
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="font-weight-bold">Good to see you!</h1>
                    <p>You already have an account? <br>Sign in!</p>
                    <button class="but" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="font-weight-bold">Hello, Friend!</h1>
                    <p>You don't have account yet? Don't worry! You still can join us</p>
                    <button class="but" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#signUp').on('click', function () {
            $('.container.auth-form').addClass('right-panel-active');
            window.history.pushState("", "Guild Manager - Register", '/register');
        });

        $('#signIn').on('click', function () {
            $('.container.auth-form').removeClass('right-panel-active');
            window.history.pushState("", "Guild Manager - Login", '/login');
        });
    </script>
@endsection
