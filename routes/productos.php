<?php

use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Rubro;
use App\Models\Proveedor;
use Illuminate\Http\Request;

// Ruta para listar productos (index)
Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
});

// Ruta para mostrar el formulario de creación de productos (create)
Route::get('/productos/create', function () {
    $marcas = Marca::all();
    $medidas = Medida::all();
    $rubros = Rubro::all();
    $proveedores = Proveedor::all();
    return view('productos.create', compact('marcas', 'medidas', 'rubros', 'proveedores'));
});

// Ruta para guardar un nuevo producto (store)
Route::post('/productos', function (Request $request) {
    $request->validate([
        'descripcion' => 'required|string|max:250',
        'rela_marcas' => 'required|integer|exists:marcas,id_marcas',        // Cambiado
        'rela_medidas' => 'required|integer|exists:medidas,id_medida',      // Cambiado
        'rela_rubro' => 'required|integer|exists:rubros,id_rubro',
        'cantidad_actual' => 'required|integer|min:0',                       // Cambiado
        'precio_venta' => 'required|numeric|min:0',                          // Cambiado
        'precio_compra' => 'required|numeric|min:0',                         // Añadido
        'porcentaje_utilidad' => 'required|integer|min:0|max:100',           // Añadido
        'rela_proveedor' => 'required|integer|exists:proveedores,id_proveedores',
        'cantidad_minima' => 'required|integer|min:0',                       // Añadido
    ]);

    Producto::create($request->all());

    return redirect('/productos')->with('success', 'Producto creado exitosamente!');
});

// Ruta para mostrar el formulario de edición de productos (edit)
Route::get('/productos/{id_productos}/edit', function ($id_productos) {
    $producto = Producto::findOrFail($id_productos);
    $marcas = Marca::all();
    $medidas = Medida::all();
    $rubros = Rubro::all();
    $proveedores = Proveedor::all();
    return view('productos.edit', compact('producto', 'marcas', 'medidas', 'rubros', 'proveedores'));
});

// Ruta para actualizar un producto (update)
Route::put('/productos/{id_productos}', function (Request $request, $id_productos) {
    $producto = Producto::findOrFail($id_productos);

    $request->validate([
        'descripcion' => 'required|string|max:250',
        'rela_marcas' => 'required|integer|exists:marcas,id_marcas',        // Cambiado
        'rela_medidas' => 'required|integer|exists:medidas,id_medida',      // Cambiado
        'rela_rubro' => 'required|integer|exists:rubros,id_rubro',
        'cantidad_actual' => 'required|integer|min:0',                       // Cambiado
        'precio_venta' => 'required|numeric|min:0',                          // Cambiado
        'precio_compra' => 'required|numeric|min:0',                         // Añadido
        'porcentaje_utilidad' => 'required|integer|min:0|max:100',           // Añadido
        'rela_proveedor' => 'required|integer|exists:proveedores,id_proveedores',
        'cantidad_minima' => 'required|integer|min:0',                       // Añadido
    ]);

    $producto->update($request->all());

    return redirect('/productos')->with('success', 'Producto actualizado exitosamente!');
});

// Ruta para eliminar un producto (destroy)
Route::delete('/productos/{id_productos}', function ($id_productos) {
    $producto = Producto::findOrFail($id_productos);
    $producto->delete();
    return redirect('/productos')->with('success', 'Producto eliminado exitosamente!');
});