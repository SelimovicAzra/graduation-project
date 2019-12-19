@extends('web-page.layouts.page')

@section('content')
    <div class="container">
        <div class="row rowDonations">
            @foreach($donation as $donation)
                <div class="col-sm-4">
                    <div class="card cardsDonations">
                        <div class="card-block card-donation">
                            <img class="picDonation"
                                 src="{{$donation->item->getMedia('item-images')->first() ? $donation->item->getMedia('item-images')->first()->getFullUrl() : 'https://cdn0.iconfinder.com/data/icons/basic-outline/64/icon-basic-set_12-camera-512.png'}}"/>
                            <h4 class="card-title card-title-donation">{{$donation->item->name}}</h4>
                            <p class="card-text card-text-donation cardDonationDes">{{$donation->item->category->name}} - {{date('M d Y', strtotime($donation->item->created_at))}}</p>
                            {{--                        <p class="card-text card-text-donation card-des">{{$donation->item->description}}</p>--}}
                            <a href="{{route('items.show', $donation->item->id)}}">
                            <button class="btn btn-primary donationButtons" type="submit">Show more</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<style>



</style>
