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
        @yield('content')
        @include('partials._footer')
    </div>
</div>
@include('partials._javascript')
@yield('scripts')
</body>
</html>
