<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('implementations.css')
    @include('implementations.js')
</head>
<body>
@include('user.layout.nav')
@include('alerts.error')
@include('alerts.success')
@yield('content')
</body>
</html>
