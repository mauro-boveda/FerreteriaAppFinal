<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    use HasFactory;

    protected $table = 'condicion'; // La tabla se llama 'condicion'
    protected $primaryKey = 'id_condicioniva';
    protected $fillable = ['descripcion'];

    public $timestamps = false; // Si tu tabla no tiene columnas created_at y updated_at
}