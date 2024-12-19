<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Ubicacion', 'Longitud'];

    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'CircuitoId');
    }
}
