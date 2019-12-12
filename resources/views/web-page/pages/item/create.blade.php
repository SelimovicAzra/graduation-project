@extends('web-page.layouts.page')

@section('content')
    <div class="card shadow-sm donation-card">
        <div class="card-header donation-card-top">
            <h5 class="d-inline"><strong>Donation</strong></h5>
            <a href="{{ route('home') }}"><button class="link-style btn btn-sm float-right goback"><i class="fas fa-arrow-circle-left"></i> Go Back</button></a>
        </div>

        <div class="card-body">

            <item-form
                :category = "{{$category}}"
                :create="true"
            ></item-form>
        </div>
    </div>
@endsection
<style>

</style>
