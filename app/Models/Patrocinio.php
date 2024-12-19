<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinio extends Model
{
    use HasFactory;

    protected $fillable = ['EquipoId', 'PatrocinadorId', 'FechaInicio', 'FechaFin'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'EquipoId');
    }

    public function patrocinador()
    {
        return $this->belongsTo(Patrocinador::class, 'PatrocinadorId');
    }
}
