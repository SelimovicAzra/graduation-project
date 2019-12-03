@extends('web-page.layouts.page')

@section('content')
    <div class="card shadow-sm profile-card">
        <div class="card-header card-top">
            <h5 class="d-inline"><strong>Personal Information</strong></h5>
            <a href="{{ route('home') }}"><button class="link-style btn btn-sm float-right goback"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>

        <div class="card-body">

            <user-form
                v-bind:user="{{$user}}"
{{--                v-bind:roles="{{$roles}}"--}}
{{--                image="{{$image}}"--}}
                :create="false"

            ></user-form>
        </div>
    </div>
@endsection
<style>
    .profile-card{
        width:80%;
        margin: 5% auto;
        float: none;
    }
    .card-top{
        background-color: rgba(	158,	199,	228, 0.3)!important;
    }

</style>
