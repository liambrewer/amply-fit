@props(['title', 'description'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ isset($title) ? $title . ' - ' . config('app.name', 'Amply Fit') : config('app.name', 'Amply Fit') }}</title>

    @include('layouts.include.common.head')
</head>
<body class="font-onest antialiased bg-slate-100">

<main class="flex flex-col gap-6 md:justify-center min-h-screen py-6 md:py-0 max-w-screen-md w-full mx-auto">
    <a wire:navigate href="{{ route('dashboard') }}">
        <h1 class="text-3xl font-semibold tracking-tight text-center">Amply Fit</h1>
    </a>

    <div class="bg-white p-4 md:p-6 md:rounded-xl shadow-md space-y-4 md:space-y-6 border-y md:border-x">
        @if (isset($title) || isset($description))
            <div class="space-y-1">
                @if (isset($title))
                    <h2 class="text-xl font-semibold">{{ $title }}</h2>
                @endif

                @if (isset($description))
                    <p class="text-sm text-gray-800">{{ $description }}</p>
                @endif
            </div>
        @endif

        {{ $slot }}
    </div>
</main>

@include('layouts.include.common.body')
</body>
</html>
