@extends('layouts.app')

@section('content')


    <!-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
    @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login and Registration</title>
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" />
    </head>

    <body>
        <div class="container">
            <div class="forms-container">

                <div class="signin-signup">
                    <form class="sign-in-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="submit" value="Login" class="btn solid" />
                        <div class="forgetpassword">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <p class="social-text">Or Sign in with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="" class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </form>
                    <form action="/dashboard" class="sign-up-form">
                        <h2 class="title">Sign up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" />
                        </div>
                        <input type="submit" class="btn" value="Sign up" />
                        <p class="social-text">Or Sign up with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h2>Have no Account ?</h2>
                        <p>
                            Innovations driven by passion to bring positive impact to people's lives.
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                    <img src="img/log.svg" class="image" alt="" />
                </div>
                <div class="panel right-panel">

                    <div class="content">
                        <h3>One of us ?</h3>
                        <p>
                            ADOPISOFT
                            The leading software provider for piso wifi vending machines. Founded in 2017, it has
                            completely
                            revolutionized the piso wifi industry. Currently, there are over 140,000(and still growing)
                            active machines powered by Adopisoft.
                        </p>
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </div>
                    <img src="img/register.svg" class="image" alt="" />
                </div>
            </div>
        </div>

        <script src="{{ asset('js/login.js') }}"></script>

    </body>

    </html>
