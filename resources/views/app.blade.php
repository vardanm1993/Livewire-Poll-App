<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire Poll</title>

    @vite('resources/css/app.css')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">

@livewire('create-poll')
</body>

</html>
