<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Se llenan las entidades independientes
        $this->call(DepartamentoSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(TipoDocumentoSeeder::class);

        // Se llenan las entidades dependientes
        $this->call(MunicipioSeeder::class);
        $this->call(PacienteSeeder::class);

        // Se registra al usuario administrador
        \App\Models\User::factory()->create([
            'identification' => '1000000000', // El usuario del administrador es 1000000000
            'name' => 'Test User Administrator',
            'email' => 'test@example.com',
            'password' => bcrypt('1234567890'), // La clave es 1234567890
        ]);
    }
}
