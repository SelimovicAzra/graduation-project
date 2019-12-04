
@extends('web-page.layouts.page')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($donation as $donation)
            <div class="col-sm-3">
                <div class="card ">
                    <div class="card-block card-donation">
                        <h4 class="card-title card-title-donation">{{$donation->item->name}}</h4>
                        <p class="card-text card-text-donation">{{$donation->item->description}}</p>
                        <button class="btn btn-primary donationButtons" type="submit">Button</button>
                    </div>
                </div>
            </div>
@endforeach
        </div>
    </div>
@endsection

<style>

</style>
