@extends('cms.layouts.admin')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="d-inline"><strong>Users Details</strong></h5>
            <a href="{{ route('usersCms.index') }}"><button class="link-style btn btn-sm btn-danger float-right"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>
{{--{{dd($city)}}--}}
        <div class="card-body">

            <user-details
                :user="{{$user}}"
                :city="{{$city?? json_encode('')}}"
                :image="'{{$image}}'"
            ></user-details>
        </div>
    </div>
@endsection
