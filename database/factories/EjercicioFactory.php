<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ejercicio>
 */
class EjercicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => nombre(),
            'n_reps' => n_reps(),
            'n_rondas' => n_rondas(),
            'video' => video(),
        ];
    }
}
