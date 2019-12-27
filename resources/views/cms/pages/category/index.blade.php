@extends('cms.layouts.admin')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="d-inline"><strong>Category</strong></h5>
            <a href="{{ route('categoriesCms.create') }}"><button class="link-style btn btn-sm btn-success float-right"><i class="fas fa-user-plus"></i>  Create new</button></a>
        </div>

        <div class="card-body">

            <category-cms-index

            ></category-cms-index>
        </div>
    </div>
@endsection
