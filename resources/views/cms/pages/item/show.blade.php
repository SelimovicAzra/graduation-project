@extends('web-page.layouts.page')

@section('content')
    <div class="card shadow-sm profile-card">
        <div class="card-header profile-card-top">
            <h5 class="d-inline"><strong>Personal Information</strong></h5>
            <a href="{{ route('donations.index') }}"><button class="link-style btn btn-sm float-right goback"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>
        <div class="card-body">
            {{dd($city?? json_encode(' '))}}
            <item-cms-details
                :item="{{$item}}"
                :city="{{$city?? json_encode(' ')}}"
                :category="{{$category?? json_encode(' ')}}"
                :image = "'{{$image}}'"
                :user-image = "'{{$userImage}}'"
                :user = "{{$user}}"

            ></item-cms-details>
        </div>
    </div>
@endsection

<style>



</style>
