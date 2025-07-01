<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Condicion;
use Illuminate\Http\Request;


// Ruta para listar clientes (index)
Route::get('/clientes', function () {
    $clientes = Cliente::all();
    return view('clientes.index', compact('clientes'));
});

// Ruta para mostrar el formulario de creación de clientes (create)
Route::get('/clientes/create', function () {
    $provincias = Provincia::all();
    $condicionesIva = Condicion::all();
    return view('clientes.create', compact('provincias', 'condicionesIva'));
});

// Ruta para guardar un nuevo cliente (store)
Route::post('/clientes', function (Request $request) {
    $request->validate([
        'nombre' => 'required|string|max:250',
        'apellido' => 'required|string|max:250',
        'dni' => 'required|string|max:250|unique:clientes,dni',
        'fechanacimiento' => 'required|date',
        'rela_provincia' => 'required|integer|exists:provincias,id_provincia',
        'localidad' => 'required|string|max:250',
        'direccion' => 'required|string|max:250',
        'cuit' => 'required|string|max:250|unique:clientes,cuit',
        'email' => 'required|string|email|max:250|unique:clientes,email',
        'telefono' => 'required|string|max:250',
        'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
    ]);

    Cliente::create($request->all());

    return redirect('/clientes')->with('success', 'Cliente creado exitosamente!');
});

// Ruta para mostrar el formulario de edición de clientes (edit)
Route::get('/clientes/{id_clientes}/edit', function ($id_clientes) {
    $cliente = Cliente::findOrFail($id_clientes);
    $provincias = Provincia::all();
    $condicionesIva = Condicion::all();
    return view('clientes.edit', compact('cliente', 'provincias', 'condicionesIva'));
});

// Ruta para actualizar un cliente (update)
Route::put('/clientes/{id_clientes}', function (Request $request, $id_clientes) {
    $cliente = Cliente::findOrFail($id_clientes);

    $request->validate([
        'nombre' => 'required|string|max:250',
        'apellido' => 'required|string|max:250',
        'dni' => 'required|string|max:250|unique:clientes,dni,'.$cliente->id_clientes.',id_clientes',
        'fechanacimiento' => 'required|date',
        'rela_provincia' => 'required|integer|exists:provincias,id_provincia',
        'localidad' => 'required|string|max:250',
        'direccion' => 'required|string|max:250',
        'cuit' => 'required|string|max:250|unique:clientes,cuit,'.$cliente->id_clientes.',id_clientes',
        'email' => 'required|string|email|max:250|unique:clientes,email,'.$cliente->id_clientes.',id_clientes',
        'telefono' => 'required|string|max:250',
        'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
    ]);

    $cliente->update($request->all());

    return redirect('/clientes')->with('success', 'Cliente actualizado exitosamente!');
});

// Ruta para eliminar un cliente (destroy)
Route::delete('/clientes/{id_clientes}', function ($id_clientes) {
    $cliente = Cliente::findOrFail($id_clientes);
    $cliente->delete();
    return redirect('/clientes')->with('success', 'Cliente eliminado exitosamente!');
});