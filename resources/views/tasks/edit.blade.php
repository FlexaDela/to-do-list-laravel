<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAREFA - EDITAR</title>
</head>
<body>
    <h1>EDITAR TAREFA</h1>
    
    <form method="POST" action="{{ route('tasks.update', $tasks->id) }}">
        @csrf
        @method('patch')

        <div>
            <label for="name">Nome da tarefa:</label>
            <input type="text" id="name" name="name" value="{{ $tasks->name }}" required>
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                @foreach(\App\Enums\TaskStatus::cases() as $status)
                    <option value="{{ $status->value }}" 
                        {{ old('status', $tasks->status->value ?? $tasks->status) == $status->value ? 'selected' : '' }}>
                        {{ ucfirst($status->value) }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" rows="5">{{ $tasks->description }}</textarea>
        </div>
        
        <button type="submit">ATUALIZAR</button>
    </form>

    <a href="{{ route('tasks.index') }}">voltar</a>
</body>
</html>