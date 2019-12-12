@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="col-md-8"></div>
                <div class="card col-md-4 mt-3 float-right card-login">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="col-md-8 offset-4 mr-0 mt-3">
                                <img class="logo" src="/images/logo.png" style="margin-left:20px;">
                            </div>
                            <div class="titleLogin">
                                <p>Good2Share</p>
                            </div>
                            <div class="login-title">Sign In</div>
                            <div class="form-group row">
                                {{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                                <div class="col-md-8 email">
                                    <input id="name" placeholder="Name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                <div class="col-md-8 email">
                                    <input id="email" placeholder="E-mail" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                <div class="col-md-8 email">
                                    <input id="password" placeholder="Password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                                <div class="col-md-8 email">
                                    <input id="password-confirm" placeholder="Confirm Password" type="password"
                                           class="form-control" name="password_confirmation" required
                                           autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 email">
                                    <button type="submit" class="btn btn-block signup-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row login">
                                <p class="already">Already have an account </p>
                                @if (Route::has('login'))
                                    <a class="nav-link "
                                       href="{{ route('login') }}">{{ __('  Login') }} </a>
                                @endif


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-styles')
@endpush
