<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoEspecial extends Model
{
    use HasFactory;
    
    // Especificar el nombre de la tabla en la base de datos
    protected $table = 'eventos_especiales';

    protected $fillable = ['Nombre', 'Fecha', 'Descripcion'];

    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'EventosCarreras', 'EventoId', 'CarreraId');
    }
}
