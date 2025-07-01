@extends('layout')

@section('title', 'Editar Producto')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Editar Producto: {{ $producto->descripcion }}</h2>
        <a href="/productos" class="btn btn-secondary">Volver al Listado</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="/productos/{{ $producto->id_productos }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" required>
                </div>
                <div class="mb-3">
                    <label for="rela_marcas" class="form-label">Marca</label> {{-- Cambiado --}}
                    <select class="form-select" id="rela_marcas" name="rela_marcas" required> {{-- Cambiado --}}
                        <option value="">Seleccione una marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id_marcas }}" {{ old('rela_marcas', $producto->rela_marcas) == $marca->id_marcas ? 'selected' : '' }}> {{-- Cambiado --}}
                                {{ $marca->marcas_descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rela_medidas" class="form-label">Medida</label> {{-- Cambiado --}}
                    <select class="form-select" id="rela_medidas" name="rela_medidas" required> {{-- Cambiado --}}
                        <option value="">Seleccione una medida</option>
                        @foreach ($medidas as $medida)
                            <option value="{{ $medida->id_medida }}" {{ old('rela_medidas', $producto->rela_medidas) == $medida->id_medida ? 'selected' : '' }}> {{-- Cambiado --}}
                                {{ $medida->descripcion }} ({{ $medida->abreviatura }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rela_rubro" class="form-label">Rubro</label>
                    <select class="form-select" id="rela_rubro" name="rela_rubro" required>
                        <option value="">Seleccione un rubro</option>
                        @foreach ($rubros as $rubro)
                            <option value="{{ $rubro->id_rubro }}" {{ old('rela_rubro', $producto->rela_rubro) == $rubro->id_rubro ? 'selected' : '' }}>
                                {{ $rubro->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cantidad_actual" class="form-label">Cantidad Actual</label> {{-- Cambiado --}}
                    <input type="number" class="form-control" id="cantidad_actual" name="cantidad_actual" value="{{ old('cantidad_actual', $producto->cantidad_actual) }}" required min="0"> {{-- Cambiado --}}
                </div>
                <div class="mb-3">
                    <label for="precio_compra" class="form-label">Precio Compra</label> {{-- Añadido --}}
                    <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" value="{{ old('precio_compra', $producto->precio_compra) }}" required min="0">
                </div>
                <div class="mb-3">
                    <label for="porcentaje_utilidad" class="form-label">Porcentaje Utilidad (%)</label> {{-- Añadido --}}
                    <input type="number" class="form-control" id="porcentaje_utilidad" name="porcentaje_utilidad" value="{{ old('porcentaje_utilidad', $producto->porcentaje_utilidad) }}" required min="0" max="100">
                </div>
                <div class="mb-3">
                    <label for="precio_venta" class="form-label">Precio Venta</label> {{-- Cambiado --}}
                    <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="{{ old('precio_venta', $producto->precio_venta) }}" required min="0"> {{-- Cambiado --}}
                    <small class="form-text text-muted">Este valor se calcula como Precio Compra + (Precio Compra * Porcentaje Utilidad / 100).</small>
                </div>
                <div class="mb-3">
                    <label for="cantidad_minima" class="form-label">Cantidad Mínima</label> {{-- Añadido --}}
                    <input type="number" class="form-control" id="cantidad_minima" name="cantidad_minima" value="{{ old('cantidad_minima', $producto->cantidad_minima) }}" required min="0">
                </div>
                <div class="mb-3">
                    <label for="rela_proveedor" class="form-label">Proveedor</label>
                    <select class="form-select" id="rela_proveedor" name="rela_proveedor" required>
                        <option value="">Seleccione un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedores }}" {{ old('rela_proveedor', $producto->rela_proveedor) == $proveedor->id_proveedores ? 'selected' : '' }}>
                                {{ $proveedor->razon_social }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            </form>
        </div>
    </div>
</div>
@endsection