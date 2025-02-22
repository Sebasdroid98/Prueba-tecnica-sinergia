<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // Accesor para crear el nombre completo
    public function fullname(): Attribute{
        return new Attribute(
            get: fn() => $this->primer_nombre .' '. $this->segundo_nombre .' '. $this->primer_apellido .' '. $this->segundo_apellido
        );
    }

    // Relacion uno a muchos con genero
    public function genero() {
        return $this->belongsTo('App\Models\Genero');
    }
}
