<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Incluir las rutas de clientes
require __DIR__.'/clientes.php';

// Incluir las rutas de proveedores
require __DIR__.'/proveedores.php';

// Incluir las rutas de productos
require __DIR__.'/productos.php';