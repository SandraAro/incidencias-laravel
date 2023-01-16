<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incidencias</title>

    @vite(['resources/js/app.js','resources/sass/app.scss'])
    @livewireStyles
</head>
<body>
    @livewire('alert')

    @yield('content')

    @livewireScripts
</body>
</html>
