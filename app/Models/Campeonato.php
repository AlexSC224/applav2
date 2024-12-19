<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Año'];

    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'CampeonatoId');
    }
}
