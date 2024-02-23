<?php

namespace Database\Seeders;

use App\Models\Allergy;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::all()->each(function ($patient) {
            Allergy::factory(1)->create(['patient_id' => $patient->id]);
        });
    }
}
