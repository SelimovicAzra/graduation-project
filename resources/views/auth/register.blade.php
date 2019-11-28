@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 offset-md-6 mt-3">
            <div class="card card-signup">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-md-8 offset-4 mr-0 mt-3">
                            <img src="/images/logo.png" style="margin-left:20px;">
                        </div>
                        <div class="col-sm-6 col-md-8 offset-md-3 title">
                            <p>Good2Share</p>
                        </div>
                        <div class="form-group row">
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            <div class="col-md-6">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            <div class="col-md-6">
                                <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block signup-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-styles')
    <style>
        #app{
            background-image: url("https://images.squarespace-cdn.com/content/v1/57ff6b30bebafba9d10c7dcd/1525359279134-468L7CWKRQ5Y8FCWMYB8/ke17ZwdGBToddI8pDm48kBNRt0cg4WAanfWojlHLplx7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1US6IfA3z_hZ3gTROHXzj40oiauNtBL88ZRQhKg2xy4MQPt_AAiqPvsV6TvkS6kIncw/Irish+Charities?format=1500w");
            background-repeat: no-repeat;
            background-size: cover;
            height:100vh;
        }
        @media (min-width: 1300px) {
            .card-signup {
                margin-left: 10rem !important;
                width: 100%;
            }
            .signup-btn{
                margin-top: 30px;
                background-color: #681706!important;
                color:white;
                font: 20px arial, sans-serif;
                font-weight: bold;
            }
        }
        form {
            position: inherit;
            margin: 60px;
        }

        #email, #password {
            width: 345px;
            margin-left: 93px;
        }

        .title {
            margin-top: 25px;
            font: 40px arial, sans-serif;
            font-weight: bold;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        input, button{
            border: 1px solid #9EC7E4!important;
            border-radius: 1rem!important;
        }




    </style>
@endpush
