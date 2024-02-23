<?php

namespace Database\Factories;

use App\Models\NextOfKin;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NextOfKin>
 */
class NextOfKinFactory extends Factory
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
            'id_card' => $this->faker->bothify('##??##?'),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'contact_number_one' => $this->faker->phoneNumber(),
            'contact_number_two' => $this->faker->phoneNumber(),
        ];
    }
}
