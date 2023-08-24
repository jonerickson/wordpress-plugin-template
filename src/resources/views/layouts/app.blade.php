<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth bg-gray-100 antialiased">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('app.css') }}" rel="stylesheet">
</head>

<body class="flex h-full flex-col">
    @yield('content')
    <script src="{{ asset('app.js') }}"></script>
</body>

</html>
