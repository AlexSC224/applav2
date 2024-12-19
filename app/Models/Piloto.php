<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'FechaNacimiento', 'Pais', 'EquipoId'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'EquipoId');
    }

    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'PilotoId');
    }
}
