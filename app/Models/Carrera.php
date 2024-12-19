<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Fecha', 'CircuitoId', 'CampeonatoId'];

    public function circuito()
    {
        return $this->belongsTo(Circuito::class, 'CircuitoId');
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class, 'CampeonatoId');
    }

    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'CarreraId');
    }

    public function eventos()
    {
        return $this->belongsToMany(EventoEspecial::class, 'EventosCarreras', 'CarreraId', 'EventoId');
    }
}
