<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} - TODOLIST </title>

    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>
<body>

    <x-header />

    {{ $slot }}

</body>
</html>
