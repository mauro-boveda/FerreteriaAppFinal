@extends('layout')

@section('title', 'Productos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Productos</h2>
        <a href="/productos/create" class="btn btn-success">Nuevo Producto</a>
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
                            <th>Descripción</th>
                            <th>Marca</th>
                            <th>Medida</th>
                            <th>Rubro</th>
                            <th>Cantidad Actual</th>  {{-- Cambiado --}}
                            <th>Precio Venta</th>    {{-- Cambiado --}}
                            <th>Precio Compra</th>   {{-- Añadido --}}
                            <th>% Utilidad</th>      {{-- Añadido --}}
                            <th>Cantidad Mínima</th> {{-- Añadido --}}
                            <th>Proveedor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id_productos }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->marca->marcas_descripcion ?? 'N/A' }}</td>
                                <td>{{ $producto->medida->descripcion ?? 'N/A' }} ({{ $producto->medida->abreviatura ?? 'N/A' }})</td>
                                <td>{{ $producto->rubro->descripcion ?? 'N/A' }}</td>
                                <td>{{ $producto->cantidad_actual }}</td>    {{-- Cambiado --}}
                                <td>{{ number_format($producto->precio_venta, 2) }}</td>      {{-- Cambiado --}}
                                <td>{{ number_format($producto->precio_compra, 2) }}</td>     {{-- Añadido --}}
                                <td>{{ $producto->porcentaje_utilidad }}%</td>                {{-- Añadido --}}
                                <td>{{ $producto->cantidad_minima }}</td>                     {{-- Añadido --}}
                                <td>{{ $producto->proveedor->razon_social ?? 'N/A' }}</td>
                                <td>
                                    <a href="/productos/{{ $producto->id_productos }}/edit" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="/productos/{{ $producto->id_productos }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection