<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposDocumento = ['CC - Cedula de ciudadanía', 'TI - Tarjeta de identidad'];

        foreach ($tiposDocumento as $tipo) {
            $tipoObj = new TipoDocumento();
            $tipoObj->nombre = $tipo;
            $tipoObj->save();
        }
    }
}
