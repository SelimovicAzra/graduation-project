@extends('web-page.layouts.page')

@section('content')
    <div class="card shadow-sm profile-card">
        <div class="card-header">
            <h5 class="d-inline"><strong>Personal Information</strong></h5>
            <a href="{{ route('home') }}"><button class="link-style btn btn-sm btn-danger float-right"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>

        <div class="card-body">

            <user-form
                v-bind:user="{{$user}}"
{{--                v-bind:city="{{$city}}"--}}
{{--                v-bind:roles="{{$roles}}"--}}
{{--                image="{{$image}}"--}}
                :create="false"

            ></user-form>
        </div>
    </div>

@endsection
