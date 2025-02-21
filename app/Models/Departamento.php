<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    // Relacion uno a muchos con municipios
    public function municipios() {
        // return $this->hasMany(Municipios::class); //Alternativa
        return $this->hasMany('App\Models\Municipios');
    }
}
