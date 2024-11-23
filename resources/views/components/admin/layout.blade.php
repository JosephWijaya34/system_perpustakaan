<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikasi - Joseph || {{ $title }} </title>

    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap"
        rel="stylesheet">

    {{-- import css dan js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-main font-roboto min-h-screen flex flex-col">
    <x-admin.navbar></x-admin.navbar>
    <div class="relative min-h-screen">
        {{ $slot }}
    </div>
    <x-admin.footer></x-admin.footer>
</body>

</html>
