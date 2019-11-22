<!DOCTYPE html>
<head>
    @include('cms.includes.head')
</head>
<body>
<div id="app">
    @include('cms.includes.sidebar')
    @include('cms.includes.header')

    <div id="content">
        @yield('content')
    </div>

    @include('cms.includes.footer')
</div>
@include('cms.includes.foot')
@stack('custom-js')
</body>

<style>
    #app{
        background-color: white!important;
    }

</style>
