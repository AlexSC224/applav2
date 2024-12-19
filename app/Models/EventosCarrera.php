<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosCarrera extends Model
{
    use HasFactory;

    protected $fillable = ['EventoId', 'CarreraId'];

    public function evento()
    {
        return $this->belongsTo(EventoEspecial::class, 'EventoId');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'CarreraId');
    }
}
