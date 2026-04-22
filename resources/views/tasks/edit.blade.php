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
            <label for="priority">Status</label>
            <select name="priority" id="priority">
                @foreach(\App\Enums\TaskPriority::cases() as $priority)
                    <option value="{{ $priority->value }}"
                        {{ old('priority', $priority->status->value ?? $priority->status) == $priority->value ? 'selected' : '' }}>
                        {{ ucfirst($priority->value) }}
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
