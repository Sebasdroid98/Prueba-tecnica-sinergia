<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    // Relacion uno a muchos (inversa) con departamentos
    public function departamentos() {
        return $this->belongsTo('App\Models\Departamento');
    }
}
