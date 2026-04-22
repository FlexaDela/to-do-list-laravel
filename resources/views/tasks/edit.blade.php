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
            <label for="phase">Fase</label>
            <select name="phase" id="phase">
                @foreach(\App\Enums\TaskPriority::cases() as $phase)
                    <option value="{{ $phase->value }}"
                        {{ old('phase', $tasks->phase->value ?? $tasks->phase) == $phase->value ? 'selected' : '' }}>
                        {{ ucfirst($phase->value) }}
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
