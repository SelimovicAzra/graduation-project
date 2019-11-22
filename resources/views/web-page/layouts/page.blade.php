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

    @include('web-page.includes.footer')
    @include('web-page.includes.footer')
</div>
@include('web-page.includes.foot')
@stack('custom-js')
</body>

<style>
    #app{
        /*background-color: rgba(223, 236, 245, 0.9)!important;*/
        background-image: url("https://www.canadahelps.org/media/5-Reasons-Why-You-Should-Donate-to-Charity.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
    }
    /*#content{*/
    /*    background-image: url("https://www.canadahelps.org/media/5-Reasons-Why-You-Should-Donate-to-Charity.jpg");*/
    /*    background-repeat: no-repeat;*/
    /*    background-size: cover;*/
    /*    height: 60vh;*/
    /*    width: 100%;*/
    /*}*/

</style>
