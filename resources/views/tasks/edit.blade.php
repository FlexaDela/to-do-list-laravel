<x-layout title="Editar">

    <x-form action="{{ route('tasks.update', $tasks->id) }}">
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
    </x-form>

    <a href="{{ route('tasks.index') }}">voltar</a>

</x-layout>
