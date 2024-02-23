<?php

namespace Database\Seeders;

use App\Models\Medication;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::all()->each(function ($patient) {
            Medication::factory(2)->create(['patient_id' => $patient->id]);
        });
    }
}
