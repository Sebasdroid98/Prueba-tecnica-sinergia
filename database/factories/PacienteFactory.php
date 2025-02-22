<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_documento'      => $this->faker->numerify('##########'),
            'primer_nombre'         => $this->faker->firstName(),
            'segundo_nombre'        => $this->faker->firstName(),
            'primer_apellido'       => $this->faker->lastName(),
            'segundo_apellido'      => $this->faker->lastName(),
            'estado'                => $this->faker->randomElement([true, false]),
            'tipo_documento_id'     => $this->faker->randomElement([1, 2]),
            'genero_id'             => $this->faker->randomElement([1, 2]),
            'municipio_id'          => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
        ];
    }
}
