<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('storage/favicon_leader.ico')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('view.style')
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
    <script src="{{mix('/js/app.js')}}" type="application/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</body>
</html>