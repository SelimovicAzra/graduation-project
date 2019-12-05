
@extends('web-page.layouts.page')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($donation as $donation)
            <div class="col-sm-3">
                <div class="card cards">
                    <div class="card-block card-donation">
                        <img class="pic" src="{{$donation->item->getMedia('item-images')->first() ? $donation->item->getMedia('item-images')->first()->getFullUrl() : 'https://cdn0.iconfinder.com/data/icons/basic-outline/64/icon-basic-set_12-camera-512.png'}}"/>
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

    .cards{
        margin-top:20%;
        margin-bottom: 7%;
        border: 2px solid #9EC7E4!important;
        border-radius: 0.5rem!important;
        text-align: center;
    }
    .pic{
        width: 150px;
    }
</style>
