<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Invoice Application</title>
    @include('implementations.css')
    @include('implementations.js')
    <style>
        body {
            font-family: DejaVu Sans, serif; }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
