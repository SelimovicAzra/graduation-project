@extends('cms.layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="d-inline"><strong>Edit Country</strong></h5>
            <a href="{{ route('countriesCms.index') }}"><button class="link-style btn btn-sm btn-danger float-right"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>

        <div class="card-body">
            <country-cms-form
                v-bind:country="{{$country}}"
                :create="false"

            ></country-cms-form>
        </div>
    </div>

@endsection
