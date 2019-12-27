@extends('cms.layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="d-inline"><strong>Edit City</strong></h5>
            <a href="{{ route('cities.index') }}"><button class="link-style btn btn-sm btn-danger float-right"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>
{{--{{dd($existingCountry)}}--}}
        <div class="card-body">
            <city-cms-form
                v-bind:city="{{$citiesCm}}"
                v-bind:existing-country="{{$existingCountry}}"
                :create="false"

            ></city-cms-form>
        </div>
    </div>

@endsection
