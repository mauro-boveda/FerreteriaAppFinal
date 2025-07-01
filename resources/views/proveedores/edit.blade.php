@extends('layout')

@section('title', 'Editar Proveedor')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Editar Proveedor: {{ $proveedor->razon_social }}</h2>
        <a href="/proveedores" class="btn btn-secondary">Volver al Listado</a>
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
            <form action="/proveedores/{{ $proveedor->id_proveedores }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="razon_social" class="form-label">Razón Social</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social', $proveedor->razon_social) }}" required>
                </div>
                <div class="mb-3">
                    <label for="telefono_contacto" class="form-label">Teléfono de Contacto</label>
                    <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto" value="{{ old('telefono_contacto', $proveedor->telefono_contacto) }}" required>
                </div>
                <div class="mb-3">
                    <label for="persona_contacto" class="form-label">Persona de Contacto</label>
                    <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" value="{{ old('persona_contacto', $proveedor->persona_contacto) }}" required>
                </div>
                <div class="mb-3">
                    <label for="cuit" class="form-label">CUIT</label>
                    <input type="text" class="form-control" id="cuit" name="cuit" value="{{ old('cuit', $proveedor->cuit) }}" required>
                </div>
                <div class="mb-3">
                    <label for="rela_condicioniva" class="form-label">Condición IVA</label>
                    <select class="form-select" id="rela_condicioniva" name="rela_condicioniva" required>
                        <option value="">Seleccione una condición de IVA</option>
                        @foreach ($condicionesIva as $condicion)
                            <option value="{{ $condicion->id_condicioniva }}" {{ old('rela_condicioniva', $proveedor->rela_condicioniva) == $condicion->id_condicioniva ? 'selected' : '' }}>
                                {{ $condicion->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
            </form>
        </div>
    </div>
</div>
@endsection