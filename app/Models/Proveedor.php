<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; // Especifica el nombre de la tabla
    protected $primaryKey = 'id_proveedores'; // Especifica la clave primaria

    public $timestamps = false; // Desactiva los timestamps created_at y updated_at

    protected $fillable = [
        'razon_social',
        'telefono_contacto',
        'persona_contacto',
        'cuit',
        'rela_condicioniva',
    ];

    // Relación con Condicion (IVA)
    public function condicionIva()
    {
        return $this->belongsTo(Condicion::class, 'rela_condicioniva', 'id_condicioniva');
    }
}