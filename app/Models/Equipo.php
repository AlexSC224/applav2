<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Fundacion', 'Pais', 'ConstructorId'];

    public function constructor()
    {
        return $this->belongsTo(Constructor::class, 'ConstructorId');
    }

    public function pilotos()
    {
        return $this->hasMany(Piloto::class, 'EquipoId');
    }

    public function autos()
    {
        return $this->hasMany(Auto::class, 'EquipoId');
    }

    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'EquipoId');
    }

    public function patrocinios()
    {
        return $this->hasMany(Patrocinio::class, 'EquipoId');
    }

    public function personal()
    {
        return $this->hasMany(Personal::class, 'EquipoId');
    }
}
