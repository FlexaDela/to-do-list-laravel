<x-layout title="Index">

    <div class="container py-5 text-light">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-3">
            <div>
                <h1 class="fw-bold text-info mb-0">Gerenciador Todo-List</h1>
                <p class="text-secondary small">Organize o seu fluxo de trabalho noturno.</p>
            </div>
            <x-form action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    Sair
                </button>
            </x-form>
        </div>

        <div class="mb-4 text-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-info px-4 fw-bold">
                + Nova Tarefa
            </a>
        </div>

        @isset($messageSuccess)
            <x-alert type="success">
                {{ $messageSuccess }}
            </x-alert>
        @endisset

        @if ($tasks->isNotEmpty())
            <div class="card bg-dark border-secondary shadow-lg">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-secondary opacity-75">
                                    <th class="ps-4 border-secondary">OK</th>
                                    <th class="border-secondary">Fase</th>
                                    <th class="border-secondary">Tarefa</th>
                                    <th class="border-secondary">Cronologia</th>
                                    <th class="text-center border-secondary">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td class="ps-4">
                                        <x-form action="{{ route('tasks.updateChecked', $task->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $task->status == 0 ? 'btn-success' : 'btn-outline-secondary' }} rounded-circle">
                                                ✓
                                            </button>
                                        </x-form>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary text-white fw-light">
                                            {{ $task->phase }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="{{ $task->status == 0 ? 'text-decoration-line-through text-secondary' : 'text-light fw-semibold' }}">
                                            {{ $task->name }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column" style="font-size: 0.8rem;">
                                            <span class="text-secondary">Criada: {{ $task->created_at->format('d/m/Y') }}</span>
                                            <span class="text-info opacity-75">{{ $task->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </td>

                                    <td class="text-center pe-4">
                                        <div class="btn-group">
                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-info">Ver</a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>

                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="d-inline ms-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apagar tarefa?')">
                                                    Apagar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card bg-dark border-secondary p-5 text-center">
                <p class="text-secondary mb-0">Nenhuma tarefa pendente no radar.</p>
            </div>
        @endif
    </div>

</x-layout>
