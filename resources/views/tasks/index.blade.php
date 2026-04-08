<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <h1>GERENCIADOR TODO-LIST</h1>
    @if ($tasks->isNotEmpty())
        @foreach ($tasks as $task)     
            <p>Tem tarefa</p><br>
            <p>{{ $task->name }}</p>
        @endforeach
    @else
        <p>Não tem tarefas cadastradas</p>
    @endif
    
</body>
</html>