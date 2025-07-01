<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_productos';

    public $timestamps = false; // Desactiva los timestamps created_at y updated_at

    protected $fillable = [
        'descripcion',
        'rela_marcas',        // Cambiado de 'rela_marca'
        'rela_medidas',       // Cambiado de 'rela_medida'
        'rela_rubro',
        'cantidad_actual',    // Cambiado de 'cantidad'
        'precio_venta',       // Cambiado de 'precio_unitario'
        'precio_compra',      // Añadido, estaba en DB pero no en fillable
        'porcentaje_utilidad', // Añadido, estaba en DB pero no en fillable
        'rela_proveedor',
        'cantidad_minima',    // Añadido, estaba en DB pero no en fillable
    ];

    // Relación con Marcas
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'rela_marcas', 'id_marcas'); // Cambiado 'rela_marca' a 'rela_marcas'
    }

    // Relación con Medidas
    public function medida()
    {
        return $this->belongsTo(Medida::class, 'rela_medidas', 'id_medida'); // Cambiado 'rela_medida' a 'rela_medidas'
    }

    // Relación con Rubros
    public function rubro()
    {
        return $this->belongsTo(Rubro::class, 'rela_rubro', 'id_rubro');
    }

    // Relación con Proveedores
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'rela_proveedor', 'id_proveedores');
    }
}