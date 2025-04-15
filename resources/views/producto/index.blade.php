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
                            setTimeout(function() {
                                document.getElementById('successMessage').style.display = 'none';
                            }, 3000);
                        </script>
                    @endif

                    <!-- Formulario de búsqueda y filtrado -->
                    <form method="GET" action="{{ route('productos.index') }}" class="row mb-4">
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar por nombre o código">
                        </div>
                        <div class="col-md-3">
                            <select name="categoria" class="form-control">
                                <option value="">Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary w-100">Buscar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary w-100">Limpiar</a>
                        </div>
                    </form>

                    <!-- Botón para crear -->
                    <button type="button" class="btn btn-primary mb-3 fw-semibold fs-7 px-3 py-1" data-bs-toggle="modal" data-bs-target="#create">
                        NUEVO
                    </button>

                    <!-- Tabla de productos -->
                    <div class="table-responsive">
                        <table class="table table-bordered shadow text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORÍA</th>
                                    <th>CÓDIGO</th>
                                    <th>NOMBRE</th>
                                    <th>PRECIO</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>IMAGEN</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                @forelse($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->categoria->nombre }}</td>
                                        <td>{{ $producto->codigo }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>${{ number_format($producto->precio, 2) }}</td>
                                        <td>{{ $producto->descripcion }}</td>
                                        <td>
                                            @if($producto->imagen)
                                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="imagen" width="60">
                                            @else
                                                Sin imagen
                                            @endif
                                        </td>
                                        <td>{{ ucfirst($producto->estado) }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $producto->id }}">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $producto->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    @include('producto.info')
                                @empty
                                    <tr>
                                        <td colspan="9">No se encontraron productos.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal de creación -->
                    @include('producto.create')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
