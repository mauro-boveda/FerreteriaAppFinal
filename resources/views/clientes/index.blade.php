@extends('layout')

@section('title', 'Clientes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Clientes</h2>
        <a href="/clientes/create" class="btn btn-success">Nuevo Cliente</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Fecha Nacimiento</th>
                            <th>Provincia</th>
                            <th>Localidad</th>
                            <th>Dirección</th>
                            <th>CUIT</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Condición IVA</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id_clientes }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido }}</td>
                                <td>{{ $cliente->dni }}</td>
                                <td>{{ $cliente->fechanacimiento }}</td>
                                <td>{{ $cliente->provincia->descripcion ?? 'N/A' }}</td>
                                <td>{{ $cliente->localidad }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->cuit }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->condicionIva->descripcion ?? 'N/A' }}</td>
                                <td>
                                    <a href="/clientes/{{ $cliente->id_clientes }}/edit" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="/clientes/{{ $cliente->id_clientes }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center">No hay clientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection