<!DOCTYPE html>
<head>
    @include('web-page.includes.head')
</head>
<body>
<div id="app">
    @include('web-page.includes.homeHeader')
    <div id="content">
        @yield('content')
    </div>
    <div id="cards">
        @yield('cards')
    </div>

{{--    @include('web-page.includes.footer')--}}
{{--    @include('web-page.includes.footer')--}}
</div>
@include('web-page.includes.foot')
@stack('custom-js')
</body>

<style>
    #app{
        background: white!important;
        height: 100vh;
    }
    #content{
        /*background-color: rgba(223, 236, 245, 0.9)!important;*/

        background: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) ),  url("https://www.canadahelps.org/media/5-Reasons-Why-You-Should-Donate-to-Charity.jpg");
        /*background-image: url("https://www.canadahelps.org/media/5-Reasons-Why-You-Should-Donate-to-Charity.jpg");*/
        /*background-repeat: no-repeat;*/
        background-size: cover;
        background-position-y: -110px;
        height: 70vh;
    }


</style>
