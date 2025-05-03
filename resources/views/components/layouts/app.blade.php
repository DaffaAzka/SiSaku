<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisaku</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="ico" href="{{ asset('logo_transparant.svg') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    <style>
        .font-sagoe {
            font-family: 'Sagoe UI';
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


</head>

<body class="bg-neutral-50 dark:bg-neutral-900">

    @if (!request()->is('signin') && !request()->is('verify') && !request()->is('cek-akun-siswa'))
        <livewire:navbar />
    @endif

    @if (!request()->is('signin') && !request()->is('verify') && !request()->is('cek-akun-siswa'))
        <div class="px-6 sm:px-36">
        @else
            <div>
    @endif
    {{ $slot }}
    </div>

    @stack('scripts')

</body>

</html>
