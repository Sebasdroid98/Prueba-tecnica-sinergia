<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero_documento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'estado',
        'tipo_documento',
        'genero',
        'municipio',
    ];

    // Accesor para crear el nombre completo
    public function fullname(): Attribute{
        return new Attribute(
            get: fn() => $this->primer_nombre .' '. $this->segundo_nombre .' '. $this->primer_apellido .' '. $this->segundo_apellido
        );
    }

    // Relacion uno a muchos con generos
    public function genero() {
        return $this->belongsTo('App\Models\Genero');
    }

    // Relacion uno a muchos con tipo de documentos
    public function tipoDocumento() {
        return $this->belongsTo('App\Models\TipoDocumento');
    }

    // Relacion uno a muchos con municipios
    public function municipio() {
        return $this->belongsTo('App\Models\Municipio');
    }
}
