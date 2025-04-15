<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito de Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('success'))
                        <div class="alert alert-success mb-4" id="successMessage">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => document.getElementById('successMessage').style.display = 'none', 3000);
                        </script>
                    @endif

                    @if(!empty($carrito) && count($carrito) > 0)
                        <div class="overflow-auto mb-4">
                            <table class="table table-bordered table-hover text-center align-middle shadow rounded">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach($carrito as $id => $producto)
                                        @php
                                            $subtotal += $producto['precio'];
                                        @endphp
                                        <tr>
                                            <td>
                                                @if($producto['imagen'])
                                                    <img src="{{ asset('storage/' . $producto['imagen']) }}" alt="Imagen" width="60" class="rounded">
                                                @else
                                                    <em>Sin imagen</em>
                                                @endif
                                            </td>
                                            <td>{{ $producto['nombre'] }}</td>
                                            <td>${{ number_format($producto['precio'], 2) }}</td>
                                            <td>{{ $producto['descripcion'] ?? 'Sin descripción' }}</td>
                                            <td>
                                                <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto del carrito?')">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @php
                            $impuestos = $subtotal * 0.16;
                            $total = $subtotal + $impuestos;
                        @endphp

                        <div class="mb-4 text-right">
                            <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
                            <p><strong>Impuestos (16%):</strong> ${{ number_format($impuestos, 2) }}</p>
                            <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
                        </div>

                        <form action="{{ route('carrito.checkout') }}" method="POST" class="text-right">
                            @csrf
                            <button type="submit" class="btn btn-success">Finalizar compra</button>
                        </form>

                    @else
                        <p>No tienes productos en el carrito.</p>
                    @endif

                    <a href="{{ route('productos.index') }}" class="btn btn-primary mt-4">Seguir comprando</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
