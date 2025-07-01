<?php

use Illuminate\Support\Facades\Route;
use App\Models\Proveedor;
use App\Models\Condicion;
use Illuminate\Http\Request;

// Ruta para listar proveedores (index)
Route::get('/proveedores', function () {
    $proveedores = Proveedor::all();
    return view('proveedores.index', compact('proveedores'));
});

// Ruta para mostrar el formulario de creación de proveedores (create)
Route::get('/proveedores/create', function () {
    $condicionesIva = Condicion::all();
    return view('proveedores.create', compact('condicionesIva'));
});

// Ruta para guardar un nuevo proveedor (store)
Route::post('/proveedores', function (Request $request) {
    $request->validate([
        'razon_social' => 'required|string|max:250',
        'telefono_contacto' => 'required|string|max:250',
        'persona_contacto' => 'required|string|max:250',
        'cuit' => 'required|string|max:250|unique:proveedores,cuit',
        'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
    ]);

    Proveedor::create($request->all());

    return redirect('/proveedores')->with('success', 'Proveedor creado exitosamente!');
});

// Ruta para mostrar el formulario de edición de proveedores (edit)
Route::get('/proveedores/{id_proveedores}/edit', function ($id_proveedores) {
    $proveedor = Proveedor::findOrFail($id_proveedores);
    $condicionesIva = Condicion::all();
    return view('proveedores.edit', compact('proveedor', 'condicionesIva'));
});

// Ruta para actualizar un proveedor (update)
Route::put('/proveedores/{id_proveedores}', function (Request $request, $id_proveedores) {
    $proveedor = Proveedor::findOrFail($id_proveedores);

    $request->validate([
        'razon_social' => 'required|string|max:250',
        'telefono_contacto' => 'required|string|max:250',
        'persona_contacto' => 'required|string|max:250',
        'cuit' => 'required|string|max:250|unique:proveedores,cuit,'.$proveedor->id_proveedores.',id_proveedores',
        'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
    ]);

    $proveedor->update($request->all());

    return redirect('/proveedores')->with('success', 'Proveedor actualizado exitosamente!');
});

// Ruta para eliminar un proveedor (destroy)
Route::delete('/proveedores/{id_proveedores}', function ($id_proveedores) {
    $proveedor = Proveedor::findOrFail($id_proveedores);
    $proveedor->delete();
    return redirect('/proveedores')->with('success', 'Proveedor eliminado exitosamente!');
});