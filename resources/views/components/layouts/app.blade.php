<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisaku</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <style>
        .font-sagoe {
            font-family: 'Sagoe UI';
        }
    </style>

</head>

<body class="bg-neutral-50 dark:bg-neutral-900">

    {{-- @if (!request()->is('login') && !request()->is('register') && !request()->is('/') && !request()->is('register') && !request()->is('verify')) --}}
    <livewire:navbar />
    {{-- @endif --}}


    {{ $slot }}

</body>

</html>
