@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="col-md-8"></div>

            <div class="card col-md-4 mt-3 float-right card-login">
{{--                <div class="card-header">{{ __('Login') }}</div>--}}
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        <div class="logo">
                            <img class="logoImg" src="/images/logo.png">
                        </div>
                        <div class="titleLogin">
                            <p>Good2Share</p>
                        </div>

                        @csrf
                        <div class="login-title">Log In</div>
                        <div class="form-group row">
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            <div class="col-md-8 email" >
                                <input id="email" placeholder="E-Mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row input-login">
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            <div class="col-md-8 password">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-8 log-btn">
                                <button type="submit" class="link-style btn btn-block login-btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                                <div class="col-md-8 rememberDiv">
                                    <div class="remember">
                                <input class="form-check-input" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember this device') }}
                                </label>
                                    </div>
                                </div>

                            <div class="col-md-8 forgotDiv">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link forgot" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
{{--                        <div class="form-group row">--}}
                                <div class="row loginAlready">
                                    <p class="already">Don't have an account</p>
                                    @if (Route::has('register'))
                                            <a class="nav-link signUp"  href="{{ route('register') }}">{{ __('  Sign up') }} </a>
                                    @endif
                                </div>
                        </div>


{{--                        </div>--}}


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
