@extends('cms.layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="d-inline"><strong>Countries</strong></h5>
        <a href="{{route('countriesCms.create')}}"><button class="link-style btn btn-sm btn-success float-right"><i class="fas fa-user-plus"></i>  Create new</button></a>

    </div>

    <div class="card-body">

        <country-cms-index

        ></country-cms-index>
    </div>
</div>
@endsection
