<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $table = 'rubros'; // Asegúrate de que el nombre de la tabla sea 'rubros' (plural)
    protected $primaryKey = 'id_rubro'; // Clave primaria de tu tabla rubros
    protected $fillable = ['descripcion'];

    public $timestamps = false; // Desactiva los timestamps created_at y updated_at
}