<x-layout title="Registrar">
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">

                            @if ($errors->any())
                                <x-alert type="danger">
                                    <ul>
                                        @foreach ($errors->all() as $error )
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </x-alert>
                            @endif

                            <div class="card-body p-5">

                                <h2 class="text-uppercase text-center mb-5">REGISTRO TODOLIST</h2>

                                <x-form action="{{ route('registerConfirm') }}">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="email">Email:</label>
                                        <input class="form-control" type="email" id="email" name="email" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Nome:</label>
                                        <input class="form-control" type="text" id="name" name="name" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Senha:</label>
                                        <input class="form-control" type="password" id="password" name="password" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Registrar</button>

                                    <div class="text-end">
                                        <a href="{{ route('login') }}" class="fw-bold text-body text-center">Fazer Login</a>
                                    </div>
                                </x-form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>




