<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ラーメンブログ')</title>
    <link rel="stylesheet" href="{{ asset('css/destyle.min.css') }}">
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..400,0..1" />
</head>
<body>
    @include('partials.header')

    @yield('content')

    @unless(isset($hideFooter) && $hideFooter)
        @include('partials.footer')
    @endunless
</body>
</html>