<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'provincias';
    protected $primaryKey = 'id_provincia';
    protected $fillable = ['descripcion'];

    public $timestamps = false; // Si tu tabla no tiene columnas created_at y updated_at
}