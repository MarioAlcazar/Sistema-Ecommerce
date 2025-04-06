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
                <th scope="col">NOMBRE</th>
                <th scope="col">DESCRIPCIÓN</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody class="table-light"> 
            @php
                $i=1;
            @endphp
            @foreach($categorias as $categoria)
            <tr>
                <td scope="row">{{ $i++}}</td>
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
            @endforeach
        </tbody>
    </table>
</div>

@include('categoria.create')

@endsection
