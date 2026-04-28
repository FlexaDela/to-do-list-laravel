<x-layout title="Detalhes: {{ $task->name }}">

    <div class="container py-5">
        <div class="mb-4">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar para a lista
            </a>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card bg-dark border-secondary shadow-lg h-100">
                    <div class="card-header border-secondary d-flex justify-content-between align-items-center py-3">
                        <h2 class="mb-0 text-info fw-bold">{{ $task->name }}</h2>
                        <span class="badge bg-warning text-dark px-3">{{ strtoupper($task->phase->value) }}</span>
                    </div>

                    <div class="card-body">
                        <h5 class="text-secondary border-bottom border-secondary pb-2">Descrição</h5>
                        <p class="text-light fs-5 mt-3">
                            {{ $task->description ?: 'Sem descrição detalhada.' }}
                        </p>

                        <div class="row mt-5 pt-3 border-top border-secondary text-secondary small">
                            <div class="col-6">
                                <strong>Criação:</strong> {{ $task->created_at->format('d/m/Y H:i') }}
                            </div>
                            <div class="col-6 text-end">
                                <strong>Última Atualização:</strong> {{ $task->updated_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-secondary bg-transparent py-3 text-end">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning px-4 fw-bold">
                            Editar Tarefa
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-dark border-secondary shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="text-info fw-bold mb-3">Status Geral</h6>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle {{ $task->status ? 'bg-success' : 'bg-secondary' }} me-2" style="width: 12px; height: 12px;"></div>
                            <span class="text-light fs-5">
                                {{ $task->status ? 'Ativa' : 'Finalizada' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark border-secondary shadow-sm">
                    <div class="card-header border-secondary bg-transparent d-flex justify-content-between align-items-center">
                        <h6 class="text-info fw-bold mb-0">Subtarefas</h6>
                        <span class="badge bg-secondary">{{ $subTask->count() }}</span>
                    </div>
                    <div class="list-group list-group-flush bg-dark">
                        @forelse ($subTask as $sub)
                            <div class="list-group-item bg-dark border-secondary d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <div class="text-light fw-bold">{{ $sub->name }}</div>
                                    <small class="text-secondary">{{ ucfirst($sub->phase->value) }}</small>
                                </div>
                                @if($sub->status)
                                    <span class="badge border border-success text-success">Pendente</span>
                                @else
                                    <span class="badge bg-success text-white">Concluída</span>
                                @endif
                            </div>
                        @empty
                            <div class="list-group-item bg-dark border-secondary text-secondary text-center py-4">
                                Nenhuma subtarefa encontrada.
                            </div>
                        @endforelse
                    </div>
                    <div class="card-footer border-secondary text-center">
                        <a href="{{ route('tasks.subtasks.create',$task->id) }}" class="btn btn-sm btn-outline-info w-100"> Adicionar Subtarefa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
