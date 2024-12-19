<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialDeCambio extends Model
{
    use HasFactory;

    protected $fillable = ['Tabla', 'Accion', 'Fecha', 'Usuario', 'Detalle'];
}
