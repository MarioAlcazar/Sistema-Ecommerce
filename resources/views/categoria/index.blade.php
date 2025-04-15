<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Mostrar mensaje de éxito -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4" id="successMessage">
                            {{ session('success') }}
                        </div>

                        <script>
                            // Oculta el mensaje después de 3 segundos
                            setTimeout(function() {
                                let alert = document.getElementById('successMessage');
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 3000);
                        </script>
                    @endif

                    <!-- Formulario de búsqueda -->
                    <form method="GET" action="{{ route('categorias.index') }}" class="row mb-4">
                        <div class="col-md-5">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar por nombre o descripción">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary w-100">Buscar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('categorias.index') }}" class="btn btn-secondary w-100">Limpiar</a>
                        </div>
                    </form>

                    <!-- Botón NUEVO estilizado igual que los encabezados -->
                    <div class="text-start mb-3">
                        <button type="button" class="btn btn-primary fw-semibold fs-7 px-3 py-1" data-bs-toggle="modal" data-bs-target="#create">
                            <i class="bi bi-plus-lg me-1"></i> NUEVO
                        </button>
                    </div>

                    <!-- Tabla de Categorías -->
                    <div class="table-responsive">
                        <table class="table table-bordered shadow text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                @php $i = 1; @endphp
                                @forelse($categorias as $categoria)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $categoria->nombre }}</td>
                                        <td>{{ $categoria->descripcion }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $categoria->id }}">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $categoria->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    @include('categoria.info')
                                @empty
                                    <tr>
                                        <td colspan="4">No se encontraron categorías.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @include('categoria.create')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
