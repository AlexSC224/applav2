<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'RolId', 'EquipoId'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'RolId');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'EquipoId');
    }
}
