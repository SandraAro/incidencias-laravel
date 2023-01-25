<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incidencias</title>

    @vite(['resources/js/app.js','resources/sass/app.scss'])
    @livewireStyles
    <link rel="stylesheet" href="https://boxy.pages.dev/css/boxy.min.css"/>
</head>
<body>
    @livewire('alert')

    @yield('content')

    @livewireScripts
    <script type="text/javascript" src="https://boxy.pages.dev/js/boxy.min.js"></script>
    <script>boxyVersion(false)</script>
</body>
</html>
