<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials._head')
</head>
<body onload="load_ckeditor()">
<div id="app">
    @include('partials._nav')
    <div class="container">
        @include('partials._messages')
        <div class="row">
            <div class="col-sm-1">@yield('left')</div>
            <div class="col-sm-10"> @yield('content')</div>
            <div class="col-sm-1">@yield('right')</div>
        </div>
        @include('partials._footer')
        @yield('scripts')
        @include('partials._javascript')
    </div>
</div>
</body>
</html>


