<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('include.style')
</head>

<body>
    <div id="app">
        @include('include.sidebar')
        <div id="main" class="layout-navbar navbar-fixed">
            @include('include.header')
            @yield('content')
        </div>
    </div>
    @include('include.script');
    @yield('script')

</body>

</html>
