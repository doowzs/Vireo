<!DOCTYPE>
<head>
    <title>@yield('title', env('APP_NAME'))</title>
    <meta charset="UTF-8">
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="author" content="{{ env('APP_AUTHOR') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.html_base.stylesheets')
</head>
<body>
    @stack('body')
    @include('layouts.html_base.scripts')
</body>