<x-layout title="Editar Tarefa">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 bg-dark text-light">
                    <div class="card-header bg-transparent border-secondary py-3 d-flex align-items-center">
                        <span class="badge bg-warning text-dark me-2">EDITAR</span>
                        <h4 class="mb-0 text-white"> {{ $tasks->name }}</h4>
                    </div>

                    <div class="card-body p-4">
                        <x-form action="{{ route('tasks.update', $tasks->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold text-secondary">Nome da Tarefa</label>
                                <input type="text"
                                       class="form-control form-control-lg bg-secondary text-white border-0 shadow-sm"
                                       id="name"
                                       name="name"
                                       value="{{ old('name', $tasks->name) }}"
                                       required>
                                @if ($erros->all())
                                    
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="phase" class="form-label fw-bold text-secondary">Fase / Prioridade</label>
                                <select name="phase" id="phase" class="form-select bg-secondary text-white border-0 shadow-sm">
                                    @foreach(\App\Enums\TaskPriority::cases() as $phase)
                                        <option value="{{ $phase->value }}"
                                            {{ old('phase', $tasks->phase->value ?? $tasks->phase) == $phase->value ? 'selected' : '' }}>
                                             {{ ucfirst($phase->value) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold text-secondary">Descrição Detalhada</label>
                                <textarea class="form-control bg-secondary text-white border-0 shadow-sm"
                                          id="description"
                                          name="description"
                                          rows="5">{{ old('description', $tasks->description) }}</textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top border-secondary pt-4">
                                <a href="{{ route('tasks.index') }}" class="btn btn-outline-light px-4">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-warning px-5 fw-bold shadow-sm">
                                    Salvar Alterações
                                </button>
                            </div>
                        </x-form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
