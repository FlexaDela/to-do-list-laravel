<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>

    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>
<body>
    <h1 class="container mt-5">GERENCIADOR TODO-LIST</h1>
    <a href="{{ route('tasks.create') }}">CRIAR TAREFA</a>

    @if ($tasks->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Finalizado</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col">Ultima atualização</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <form action="{{ route('tasks.updateChecked', $task->id) }}" method="post" id="form-check-{{ $task->id }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-check d-flex justify-content-center">
                                    <button type="submit">finalizar</button>
                                </div>
                            </form>
                        </td>

                        <td>
                            {{ $task->status }}
                        </td>
                        
                        <td class="{{ $task->checked == 0 ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $task->name }}
                        </td>

                        <td>
                            <small>{{ $task->created_at->format('d/m/Y H:i') }}</small>
                        </td>

                         <td>
                            <small class="text-muted italic">{{ $task->updated_at->diffForHumans() }}</small>
                        </td>

                        <td class="text-center">
                            <div class="btn-group px-5" role="group">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-info"> Ver</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Confirmar exclusão?')"> 
                                        Deletar
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>     
    @else
        <p>Não tem tarefas cadastradas</p>
    @endif
    
</body>
</html>