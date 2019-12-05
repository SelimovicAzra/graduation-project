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
        background: white!important;
        min-height: 100vh;
    }
</style>
