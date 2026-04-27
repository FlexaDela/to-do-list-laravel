<x-layout title="Nova Subtarefa">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-secondary bg-dark text-light">
                    <div class="card-header bg-transparent border-secondary py-4 text-center">
                        <span class="badge bg-info text-dark mb-2">NOVA SUBTAREFA</span>
                        <h2 class="fw-bold text-white mb-0">Adicionar Etapa</h2>
                        <p class="text-secondary small mt-2">Vinculada a: <span class="text-info">{{ $task->name }}</span></p>
                    </div>

                    <div class="card-body p-4">
                        <x-form action="{{ route('tasks.subtasks.store', $task->id) }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold text-info">
                                    <i class="bi bi-list-check me-1"></i> Nome da Subtarefa
                                </label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control form-control-lg bg-dark text-white border-secondary focus-ring focus-ring-info shadow-sm"
                                       placeholder="O que precisa ser feito?"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phase" class="form-label fw-bold text-info">
                                    <i class="bi bi-arrow-right-circle me-1"></i> Fase Inicial
                                </label>
                                <select name="phase" id="phase" class="form-select bg-dark text-white border-secondary shadow-sm">
                                    @foreach(['initial', 'developing', 'finished'] as $phase)
                                        <option value="{{ $phase }}"
                                            {{ old('phase', 'initial') == $phase ? 'selected' : '' }}>
                                             {{ ucfirst($phase) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top border-secondary pt-4 mt-2">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-outline-secondary px-4 text-light">
                                    Voltar
                                </a>
                                <button type="submit" class="btn btn-info px-5 fw-bold shadow">
                                    Criar Subtarefa
                                </button>
                            </div>
                        </x-form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
