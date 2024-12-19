<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = ['CarreraId', 'PilotoId', 'EquipoId', 'Posicion', 'Tiempo', 'Puntos'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'CarreraId');
    }

    public function piloto()
    {
        return $this->belongsTo(Piloto::class, 'PilotoId');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'EquipoId');
    }
}
