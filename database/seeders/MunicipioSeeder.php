<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Municipio::factory(10)->create();

        $idsMunicipios = [1, 2, 3, 4, 5];

        foreach ($idsMunicipios as $id) {
            $municipioObj = new Municipio();
            $municipioObj->nombre = 'Municipio A'.$id;
            $municipioObj->departamento_id = $id;
            $municipioObj->save();
            
            $municipioObj2 = new Municipio();
            $municipioObj2->nombre = 'Municipio B'.$id;
            $municipioObj2->departamento_id = $id;
            $municipioObj2->save();
        }

    }
}
