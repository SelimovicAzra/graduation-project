<!DOCTYPE html>
<head>
    @include('cms.includes.head')
</head>
<body>
<div id="app" class="cms-layout">
    @include('cms.includes.sidebar')
    @include('cms.includes.header')

    <div id="contentCms">
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
