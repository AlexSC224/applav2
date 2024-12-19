<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre'];

    public function personal()
    {
        return $this->hasMany(Personal::class, 'RolId');
    }
}
