<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRIAR TAREFA</h1>
    
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="name">Nome da tarefa:</label>
            <input type="text" id="name" name="name" placeholder="Ex: estudar laravel" required>
        </div>

        <div>
            <label for="description">Descrição:</label>
            <textarea type="text" id="description"></textarea>
        </div>
        
        <button type="submit">CRIAR</button>
    </form>

    <a href="{{ route('tasks.index') }}">voltar</a>
</body>
</html>