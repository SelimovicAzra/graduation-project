@extends('cms.layouts.admin')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="d-inline"><strong>Cities Details</strong></h5>
            <a href="{{ route('cities.index') }}"><button class="link-style btn btn-sm btn-danger float-right"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>

        <div class="card-body">

            <city-cms-details
                v-bind:city="{{$citiesCm}}"
                v-bind:country="{{$country}}"
            ></city-cms-details>
        </div>
    </div>
@endsection
