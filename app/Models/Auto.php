<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = ['Modelo', 'Motor', 'ConstructorId', 'EquipoId'];

    public function constructor()
    {
        return $this->belongsTo(Constructor::class, 'ConstructorId');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'EquipoId');
    }
}
