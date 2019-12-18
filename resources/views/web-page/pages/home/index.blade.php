@extends('web-page.layouts.homePage')

@section('app')
@endsection
@section('content')

    <section id="home" class="main-banner parallaxie">
        <div class="heading">
            <h1>Welcome to Good2Share</h1>
            <p> “No one has ever become poor <br>by giving.”</p>

        </div>
    </section>

@endsection
@section('cards')
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12">--}}
{{--                <div class="card ">--}}
{{--                    <div class="card-block">--}}
{{--                        <h4 class="card-title">Card title</h4>--}}
{{--                        <p class="card-text ">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                        <button class="btn btn-primary" type="submit">Button</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

<style>

    .heading p {
        font-size: 28px!important;
    font-weight: bold;
}
    .parallaxie{
        background: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ),  url("https://www.canadahelps.org/media/5-Reasons-Why-You-Should-Donate-to-Charity.jpg") no-repeat;
        /*background-repeat: no-repeat;*/
        background-size: cover;
        min-height: auto;
    }

    .main-banner{
        height: 100%;
        position: relative;
    }

    .main-banner{
        display: table;
        width: 100%;
        text-align: center;
    }
    .main-banner::after {
        content: " ";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #000;
        z-index: 0;
        opacity: .6;
    }
    .heading{
        color: #fff;
        display: table-cell;
        vertical-align: middle;
        position: relative;
        z-index: 1;
    }
    .heading h1{
        color: #ffffff;
        font-weight: 700;
        font-size: 62px;
        text-transform: uppercase;
    }
    .heading p{
        font-size: 18px;
        padding: 20px 0px;
    }

    .heading h3{
        color: white;
    }
</style>
