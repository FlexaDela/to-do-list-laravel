<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <h1>GERENCIADOR TODO-LIST</h1>
    <a href="{{ route('tasks.create') }}">CRIAR TAREFA</a>

    @if ($tasks->isNotEmpty())
        @foreach ($tasks as $task)     
           <div>
                <p>status: {{$task->status}}</p>
                <p>nome: {{$task->name}}</p>
                @if($task->description) <p>descrição:{{$task->description}}</p> @else <p>descrição:nenhuma descrição</p>@endif 
                <p>criando em: {{$task->created_at->format('d/m/Y H:i')}}</p>
                <p>atualizado em: {{$task->updated_at->format('d/m/Y H:i')}}</p>
                
               <div>
                 <form method="POST" action="{{ route('tasks.updateChecked',$task->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">{{$task->checked}}</button>
                </form>
               </div>

                <div>
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">DELETAR</button>
                </form>
                </div>

                <a>editar</a>
           </div>
        @endforeach
    @else
        <p>Não tem tarefas cadastradas</p>
    @endif
    
</body>
</html>