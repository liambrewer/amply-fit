<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Amply Fit') }}</title>

    @include('layouts.include.common.head')
</head>
<body class="font-onest antialiased bg-slate-100">
{{ $slot }}

@include('layouts.include.common.body')
</body>
</html>
