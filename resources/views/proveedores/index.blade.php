@extends('layout')

@section('title', 'Proveedores')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Proveedores</h2>
        <a href="/proveedores/create" class="btn btn-success">Nuevo Proveedor</a>
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
                            <th>Razón Social</th>
                            <th>Teléfono Contacto</th>
                            <th>Persona Contacto</th>
                            <th>CUIT</th>
                            <th>Condición IVA</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->id_proveedores }}</td>
                                <td>{{ $proveedor->razon_social }}</td>
                                <td>{{ $proveedor->telefono_contacto }}</td>
                                <td>{{ $proveedor->persona_contacto }}</td>
                                <td>{{ $proveedor->cuit }}</td>
                                <td>{{ $proveedor->condicionIva->descripcion ?? 'N/A' }}</td>
                                <td>
                                    <a href="/proveedores/{{ $proveedor->id_proveedores }}/edit" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="/proveedores/{{ $proveedor->id_proveedores }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este proveedor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay proveedores registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection