<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Pais'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'ConstructorId');
    }

    public function autos()
    {
        return $this->hasMany(Auto::class, 'ConstructorId');
    }
}
