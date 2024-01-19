<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire Poll</title>

    @vite('resources/css/app.css')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <div>
        <h2 class="mt-4 mb-4 text-2xl text-yellow-600">Create Poll</h2>
        @livewire('create-poll')
    </div>
    <div class="mt-10">
        <h2 class="mt-4 mb-4 text-2xl text-green-600">Available Polls</h2>
        @livewire('polls')
    </div>
</body>

</html>
