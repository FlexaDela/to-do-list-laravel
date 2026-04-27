<x-layout title="Criar Nova Tarefa">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 bg-dark text-light">
                    <div class="card-header bg-transparent border-secondary py-3">
                        <h4 class="mb-0">Nova SubTarefa</h4>
                    </div>

                    <div class="card-body p-4">
                        <x-form action="{{ route('subTask.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Nome da Tarefa</label>
                                <input type="text"
                                       class="form-control bg-secondary text-white border-0 shadow-sm"
                                       id="name"
                                       name="name"
                                       placeholder="Ex: Estudar Service Containers"
                                       required>
                                <div class="form-text text-muted">Seja breve e direto.</div>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Descrição</label>
                                <textarea class="form-control bg-secondary text-white border-0 shadow-sm"
                                          id="description"
                                          name="description"
                                          rows="4"
                                          placeholder="O que exatamente você precisa fazer?"></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-4">
                                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary px-4 me-md-2">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary px-5 fw-bold">
                                    Criar Tarefa
                                </button>
                            </div>
                        </x-form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
