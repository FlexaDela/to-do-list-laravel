<x-layout title="Editar Tarefa">
    <div class="container py-5">
        <div class="row justify-content-center">

            @if ($errors->any())
                <x-alert type="danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </x-alert>
            @endif

            @isset($successMensage)
                <x-alert type="success">
                    {{ $successMensage }}
                </x-alert>
            @endisset

            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-secondary bg-dark text-light">

                    <div class="card-header bg-transparent border-secondary py-4 text-center">
                        <h2 class="fw-bold text-warning mb-1">Editar Tarefa</h2>
                        <p class="text-secondary small mb-0">Modifique os detalhes abaixo para atualizar a sua lista.</p>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold text-info">
                                    <i class="bi bi-pencil-square me-1"></i> Nome da Tarefa
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg bg-dark text-white border-secondary focus-ring focus-ring-warning shadow-sm"
                                       id="name"
                                       name="name"
                                       value="{{ old('name', $tasks->name) }}"
                                       required>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="phase" class="form-label fw-bold text-info">
                                    <i class="bi bi-layers me-1"></i> Fase / Prioridade
                                </label>
                                <select name="phase" id="phase" class="form-select bg-dark text-white border-secondary shadow-sm">
                                    @foreach(\App\Enums\TaskPriority::cases() as $phase)
                                        <option value="{{ $phase->value }}"
                                            {{ old('phase', $tasks->phase->value ?? $tasks->phase) == $phase->value ? 'selected' : '' }}>
                                             {{ ucfirst($phase->value) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold text-info">
                                    <i class="bi bi-text-paragraph me-1"></i> Descrição Detalhada
                                </label>
                                <textarea class="form-control bg-dark text-white border-secondary shadow-sm"
                                          id="description"
                                          name="description"
                                          rows="4"
                                          placeholder="Descreva o que precisa ser feito...">{{ old('description', $tasks->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top border-secondary pt-4 mt-2">
                                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary px-4 text-light">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-warning px-5 fw-bold shadow">
                                    Gravar Alterações
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <small class="text-secondary italic">Última modificação: {{ $tasks->updated_at->diffForHumans() }}</small>
                </div>

            </div>
        </div>
    </div>
</x-layout>
