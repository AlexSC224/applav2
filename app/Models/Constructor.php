<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla en la base de datos
    protected $table = 'constructores';

    protected $fillable = ['Nombre', 'Pais'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'constructor_id'); // Asegúrate de usar 'constructor_id'
    }

    public function autos()
    {
        return $this->hasMany(Auto::class, 'constructor_id'); // Asegúrate de usar 'constructor_id'
    }
}
