<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    protected $table = 'medidas';
    protected $primaryKey = 'id_medida';
    protected $fillable = ['descripcion', 'abreviatura', 'activo'];

    public $timestamps = false; // Desactiva los timestamps
}