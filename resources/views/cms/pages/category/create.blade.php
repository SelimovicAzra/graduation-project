@extends('cms.layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="d-inline"><strong>Create Category</strong></h5>
            <a href="{{ route('categoriesCms.index') }}"><button class="link-style btn btn-sm btn-danger float-right"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>

        <div class="card-body">
            <category-cms-form
                :create="true"
            ></category-cms-form>
        </div>
    </div>
@endsection
