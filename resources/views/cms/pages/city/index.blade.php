@extends('cms.layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="d-inline"><strong>Cities</strong></h5>
        <a href="{{route('cities.create')}}"><button class="link-style btn btn-sm btn-success float-right"><i class="fas fa-user-plus"></i>  Create new</button></a>
    </div>

    <div class="card-body">

        <city-cms-index

        ></city-cms-index>
    </div>
</div>
@endsection
