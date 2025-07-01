<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_clientes';

    public $timestamps = false; // <--- Añade esta línea aquí

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fechanacimiento',
        'rela_provincia',
        'localidad',
        'direccion',
        'cuit',
        'email',
        'telefono',
        'rela_condicioniva',
    ];

    // Relación con Provincias
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'rela_provincia', 'id_provincia');
    }

    // Relación con Condicion (IVA)
    public function condicionIva()
    {
        return $this->belongsTo(Condicion::class, 'rela_condicioniva', 'id_condicioniva');
    }
}