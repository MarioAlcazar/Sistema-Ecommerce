@extends('welcome')

@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
    NUEVO
</button>

<div class="table-responsive mt-3">
    <table class="table table-bordered shadow">
        <thead class="text-white text-center"> 
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CATEGORÍA</th>
                <th scope="col">CÓDIGO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRECIO</th>
                <th scope="col">DESCRIPCIÓN</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody class="table-light"> 
            @foreach($productos as $producto)
            <tr>
                <td scope="row">{{ $producto->id }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{$producto->imagen}}</td>
                <td>{{ $producto->estado }}</td>
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
            @endforeach
        </tbody>
    </table>
</div>
@include('producto.create')

@endsection
