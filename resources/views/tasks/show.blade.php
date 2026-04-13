<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>

    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>
<body>
    <h1 class="container mt-5">TAREFA {{ $task->name }}</h1>
        <div>status: {{ $task->status}}</div>
        <div>DESCRIÇÃO:{{ $task->description}}</div>
        <div>Finalizado:{{ $task->chcked}}</div>
        <div>Finalizado:{{ $task->created_at}}</div>
    <a href="{{ route('tasks.index') }}">VOLTAR</a>
    <a href="{{ route('tasks.edit', $task->id) }}">Editr tarefa</a>
</body>
</html>