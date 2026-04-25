<x-layout title="{{ $task->name }}">

    <h1 class="container mt-5">TAREFA: {{ $task->name }}</h1>
        <div>PRIORIDADE: {{ $task->phase}}</div>
        <div>DESCRIÇÃO:{{ $task->description}}</div>
        <div>STATUS:{{ $task->status}}</div>
        <div>DATA DE CRIAÇÃO:{{ $task->created_at}}</div>
        <div>ULTIMA ATUALIZAÇÃO:{{ $task->updated_at}}</div>
    <a href="{{ route('tasks.index') }}">VOLTAR</a>
    <a href="{{ route('tasks.edit', $task->id) }}">Editr tarefa</a>

</x-layout>
