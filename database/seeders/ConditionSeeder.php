<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::all()->each(function ($patient) {
            Condition::factory(1)->create(['patient_id' => $patient->id]);
        });
    }
}
