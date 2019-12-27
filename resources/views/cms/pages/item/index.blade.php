@extends('cms.layouts.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            {{--            <a href="{{ route('users.create') }}"><button class="link-style btn btn-sm btn-success float-right"><i class="fas fa-user-plus"></i>  Create new</button></a>--}}
        </div>

        <div class="card-body">
            <item-cms-index

            ></item-cms-index>
        </div>
    </div>
@endsection
