<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAREFA - EDITAR</title>
</head>
<body>
    <h1>EDITAR TAREFA</h1>
    
    <form method="POST" action="{{ route('tasks.update') }}">
        @csrf
        @method('patch')
        <div>
            <label for="name">Nome da tarefa:</label>
            <input type="text" id="name" name="name" placeholder="Ex: estudar laravel" required>
        </div>

        <div>
           <select name='status'>
                @foreach ($task as )
                    
                @endforeach
           </select>
        </div>

        <div>
            <label for="description">Descrição:</label>
            <textarea type="text" id="description"></textarea>
        </div>
        
        <button type="submit">ATUALIZAR</button>
    </form>

    <a href="{{ route('tasks.index') }}">voltar</a>
</body>
</html>