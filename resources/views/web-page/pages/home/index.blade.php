
@extends('web-page.layouts.homePage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="text">You make a difference</p>
            </div>
        </div>
    </div>
    @endsection
@section('cards')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card ">
                    <div class="card-block card-home">
                        <h4 class="card-title card-title-home">Card title</h4>
                        <p class="card-text card-text-home">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <button class="btn btn-primary homeButtons" type="submit">Button</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-block card-home">
                        <h4 class="card-title card-title-home">Card title</h4>
                        <p class="card-text card-text-home">This card has supporting text below as a natural lead-in.
                            Aliquam codeply mauris arcu, tristique a lobortis vitae, condimentum feugiat justo.</p>
                        <button class="btn btn-primary homeButtons" type="submit">Button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>

</style>
