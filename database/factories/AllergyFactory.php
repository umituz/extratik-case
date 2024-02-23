<?php

namespace Database\Factories;

use App\Models\Allergy;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Allergy>
 */
class AllergyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'name' => $this->faker->word,
            'notes' => $this->faker->text,
        ];
    }
}
