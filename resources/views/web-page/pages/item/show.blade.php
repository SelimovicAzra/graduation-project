@extends('web-page.layouts.page')

@section('content')
    <div class="card shadow-sm profile-card">
        <div class="card-header profile-card-top">
            <h5 class="d-inline"><strong>Personal Information</strong></h5>
            <a href="{{ route('donations.index') }}"><button class="link-style btn btn-sm float-right goback"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>
                <div class="card-body">
{{--{{dd($userImage)}}--}}
                    <item-details
                        v-bind:item="{{$item}}"
                        v-bind:city="{{$city}}"
                        v-bind:category="{{$category}}"
                        v-bind:image = "'{{$image}}'"
                        v-bind:user-image = "'{{$userImage}}'"
                        v-bind:user = "{{$user}}"

            ></item-details>
        </div>
    </div>
@endsection

<style>



</style>
