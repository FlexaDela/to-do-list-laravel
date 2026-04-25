<x-layout title="Criar">
    <x-form method="POST" action="{{ route('tasks.store') }}">
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
    </x-form>

    <a href="{{ route('tasks.index') }}">voltar</a>
</x-layout>
