<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <h1>布局</h1>
        @section('header')
            <h2>父 - 头部</h2>
        @show

        <div class="container">
            <h2>父 - 主体</h2>
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

    <script>
    @yield('script')
    </script>
</body>
</html>
