<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_card' => $this->faker->unique()->bothify('######??'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date,
            'address' => $this->faker->address,
            'post_code' => $this->faker->postcode,
            'contact_number_one' => $this->faker->phoneNumber,
            'contact_number_two' => $this->faker->phoneNumber
        ];
    }
}
