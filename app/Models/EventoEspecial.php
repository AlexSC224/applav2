<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoEspecial extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Fecha', 'Descripcion'];

    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'EventosCarreras', 'EventoId', 'CarreraId');
    }
}
