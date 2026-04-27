<x-layout title="Editar Subtarefa">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-secondary bg-dark text-light">
                    <div class="card-header bg-transparent border-secondary py-4 text-center">
                        <span class="badge bg-warning text-dark mb-2">EDITAR</span>
                        <h2 class="fw-bold text-white mb-0">Ajustar Subtarefa</h2>
                    </div>

                    <div class="card-body p-4">
                        <x-form action="{{ route('tasks.subtasks.update', $subTask->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold text-warning">
                                    <i class="bi bi-pencil-square me-1"></i> Nome da Subtarefa
                                </label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control form-control-lg bg-dark text-white border-secondary focus-ring focus-ring-warning shadow-sm"
                                       value="{{ old('name', $subTask->name) }}"
                                       required>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phase" class="form-label fw-bold text-warning">
                                    <i class="bi bi-arrow-repeat me-1"></i> Progresso Atual
                                </label>
                                <select name="phase" id="phase" class="form-select bg-dark text-white border-secondary shadow-sm">
                                    @foreach(['initial', 'developing', 'finished'] as $phase)
                                        <option value="{{ $phase }}"
                                            {{ old('phase', $subTask->phase) == $phase ? 'selected' : '' }}>
                                             {{ ucfirst($phase) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 bg-secondary bg-opacity-10 p-3 rounded border border-secondary border-opacity-25">
                                <div class="form-check form-switch">
                                    <input class="form-check-input shadow-none" type="checkbox" role="switch" id="status" name="status"
                                           value="1" {{ old('status', $subTask->status) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold text-light" for="status">Subtarefa Ativa</label>
                                </div>
                                <small class="text-secondary d-block mt-1">Desative se a subtarefa for suspensa ou concluída.</small>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top border-secondary pt-4 mt-2">
                                <a href="{{ route('tasks.show', $subTask->task_id) }}" class="btn btn-outline-secondary px-4 text-light">
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn-warning px-5 fw-bold shadow">
                                    Salvar Alterações
                                </button>
                            </div>
                        </x-form>
                    </div>
                </div>

                <div class="text-center mt-3 text-secondary small">
                    ID da Subtarefa: #{{ $subTask->id }} | Pertence à Tarefa #{{ $subTask->task_id }}
                </div>

            </div>
        </div>
    </div>
</x-layout>
